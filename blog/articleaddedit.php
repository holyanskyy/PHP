<?php

require_once 'db.php';

if (!isset($_SESSION['user'])) {
    echo '<h1>Access forbidden</h1>';
    echo "Only logged in users are allowed to post";
    echo '<a href="index.php">Click to continue</a>';
    exit;
}

function getArticleForm($title = "", $body = "") {
    return <<< ENDTAG
<h1>Article</h1>
<form method="post" enctype="multipart/form-data">
    Title: <input type="text" name="title" value="$title"><br><br>
    Body: <textarea rows="4" cols="50" name="body" >$body</textarea><br><br>
    Select image to upload:
            <input type="file" name="fileToUpload"> <br><br>
            
    <input type="submit" value="Add article" name='submit'>

ENDTAG;
}

if (!isset($_POST['submit'])) {
    // STATE 1: First show
    echo getArticleForm();
} else {
    $authorID = $_SESSION['user']['ID'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $date = date('Y-m-d');

    // submission received - verify
    $errorList = array();
    if (strlen($title) < 4) {
        array_push($errorList, "Title of article must be at least 4 characters long");
    }
    if (strlen($body) < 50) {
        array_push($errorList, "Body of article must be at least 50 characters long");
    }


    //  image upload

    $target_dir = "uploads/";
    $max_file_size = 5 * 1024 * 1024; // 5000000

    // 
    /*
     * echo "<pre>\n";
    echo "\$_FILES:\n";
    print_r($_FILES);
     */
     

    if (!isset($_POST['submit'])) {
        die("Error: File upload expected.");
    }
    
    // Image to upload
    $fileUpload = $_FILES['fileToUpload'];

    $check = getimagesize($fileUpload["tmp_name"]);
    if (!$check) {
        die("Error: File upload was not an image file.");
    }
    switch ($check['mime']) {
        case 'image/png':
        case 'image/gif':
        case 'image/bmp':
        case 'image/jpeg':
            break;
        default:
            die("Error: Only accepting valie png,gif,bmp,jpg files.");
    }
    if ($fileUpload['size'] > $max_file_size) {
        die("Error: File to big, maximuma accepted is $max_file_size bytes");
    }

// WARNING (CYA): Make sure no '..' is allowed in the path
// SOLUTION 1: use the original file name
    /*if (strstr($fileUpload['name'], '..')) {
        die("Error: do not mess with the Zohan");
    }
    $target_file = $target_dir . $fileUpload['name'];*/

// SOLUTION 2: generate your own file name
    $file_extension = explode('/', $check['mime'])[1];
    $target_file = $target_dir . md5($fileUpload["name"] . time()) . '.' . $file_extension;

    if (move_uploaded_file($fileUpload["tmp_name"], $target_file)) {
        echo "The file " . basename($fileUpload["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    
    // end image upload

    //
    if ($errorList) {
        // STATE 3: submission failed        
        echo "<ul>\n";
        foreach ($errorList as $error) {
            echo "<li>" . htmlspecialchars($error);
        }
        echo "</ul>\n\n";
        echo getArticleForm($title, $body);
    } else {
        // STATE 2: submission successful
        $sql = sprintf("INSERT INTO articles VALUES (NULL, '%s', '%s', '%s', '%s', '%s')", 
                mysqli_escape_string($conn, $authorID), 
                mysqli_escape_string($conn, $date), 
                mysqli_escape_string($conn, $title), 
                mysqli_escape_string($conn, $body),
                mysqli_escape_string($conn, $target_file)
                );
        $result = mysqli_query($conn, $sql);


        if (!$result) {
            die("Error executing query [ $sql ] : " . mysqli_error($conn));
        }
        echo "<h1>Article is added successfully</h1>\n";
        // DEBUG: page reload
        echo 'You may <a href="logout.php"> Logout </a>' . ' or <a href="articleaddedit.php"> post an article </a>';
    }
}


/*
 articleaddedit.php

TODO: add 3-state form with Subject, Body (textarea)
Require subject at least 4 characters long,
Require body at least 50 characters long.
Make sure you re-display subject and body if submission has failed.
On successful submission add article to database.
 */
 
 
