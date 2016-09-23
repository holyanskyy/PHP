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
<form method="post">
    Title: <input type="text" name="title" value="$title"><br><br>
    Body: <textarea rows="4" cols="50" name="body" >$body</textarea><br><br>
    
    <input type="submit" value="Add article">
</form>
ENDTAG;
}

if (!isset($_POST['title'])) {
    // STATE 1: First show
    echo getArticleForm($title, $body);
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
        $sql = sprintf("INSERT INTO articles VALUES (NULL, '%s', '%s', '%s', '%s')", 
                mysqli_escape_string($conn, $authorID), 
                mysqli_escape_string($conn, $title), 
                mysqli_escape_string($conn, $body), 
                mysqli_escape_string($conn, $date));
        $result = mysqli_query($conn, $sql);
        
                
        if (!$result) {
            die("Error executing query [ $sql ] : " . mysqli_error($conn));
        }
        echo "<h1>Article is added successfully</h1>\n";
        // DEBUG: page reload
        echo 'You may <a href="logout.php"> Logout </a>'.' or <a href="articleaddedit.php"> post an article </a>';
       
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
 
 
