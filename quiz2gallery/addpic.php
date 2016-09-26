<h3>Add New Picture</h3>

<?php
require_once 'db.php';

//  image upload
$target_dir = "uploads/";
$max_file_size = 5 * 1024 * 1024; // 5000000
// Only authenticated users are allowed to post a new article
if (!isset($_SESSION['user'])) {
    echo '<h1>Access forbidden</h1>';
    echo "Only logged in users are allowed to post";
    echo '<a href="index.php">Click to continue</a>';
    exit;
}

function getPictureForm($descr = "") {
    return <<< ENDTAG
<h1>Picture</h1>
<form method="post" enctype="multipart/form-data">
    
    Picture: <input type="file" name="picFile"> <br><br>
    Description: <input type="text" name="description" value="$descr"><br><br> 
        
    <input type="submit" value="Add picture" name='submit'>

ENDTAG;
}

if (!isset($_POST['description'])) {
    // STATE 1: First show
    echo getPictureForm();
} else {
    $userID = $_SESSION['user']['ID'];
    $descr = $_POST['description'];

    // submission received - verify
    $errorList = array();
    if (strlen($descr) < 4) {
        array_push($errorList, "Description must be at least 4 characters long");
    }


    if (!isset($_FILES['picFile'])) {
        // not receiving an upload of file - error!
        array_push($errorList, "You must select a picture for upload");
    } else {
        $fileUpload = $_FILES['picFile'];

        $check = getimagesize($fileUpload["tmp_name"]);
        if (!$check) {
            array_push($errorList, "File upload was not an image file.");
        } elseif (!in_array($check['mime'], array('image/png', 'image/gif', 'image/bmp', 'image/jpeg'))) {
            array_push($errorList, "Error: Only accepting value png,gif,bmp,jpg files.");
        } elseif ($fileUpload['size'] > $max_file_size) {
            array_push($errorList, "Error: File to big, maximuma accepted is $max_file_size bytes");
        }
    }

    //Display error messages if invalid data is submitted
    if ($errorList) {
        // STATE 3: submission failed 
        echo "<h5>Problems  found in your submission</h5>\n";
        echo "<ul>\n";
        foreach ($errorList as $error) {
            echo "<li>" . htmlspecialchars($error);
        }
        echo "</ul><br>\n\n";
        echo getPictureForm();
        
    } else {
        // STATE 2: submission successful
        $file_extension = explode('/', $check['mime'])[1];
        $target_file = $target_dir . md5($fileUpload["name"] . time()) . '.' . $file_extension;

        if (move_uploaded_file($fileUpload["tmp_name"], $target_file)) {
            echo "The file " . basename($fileUpload["name"]) . " has been uploaded.";
        } else {
            die("Fatal error: There was an server-side error handling the upload of your file.");
        }
        $sql = sprintf("INSERT INTO pictures VALUES (NULL, '%s', '%s', '%s')", 
                mysqli_escape_string($conn, $_SESSION['user']['ID']), 
                mysqli_escape_string($conn, $target_file), 
                mysqli_escape_string($conn, $descr)
        );
        $result = mysqli_query($conn, $sql);


        if (!$result) {
            die("Error executing query [ $sql ] : " . mysqli_error($conn));
        } else {
            echo "<h1>Picture was added successfully</h1>\n";
            echo "<a href=\"index.php\">Go to home page</a>";
        }
    }
}
