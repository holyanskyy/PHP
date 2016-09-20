<?php

/* require_once 'db.php'; */

if (!isset($_GET["description"]) || !isset($_GET["dueDate"]) || !isset($_GET["isDone"])) {

    echo "Error: description, dueDate and isDone must be provided";
} else {
    $description = $_GET["description"];
    $dueDate = $_GET["dueDate"];
    $isDone = $_GET["isDone"];



    if (strlen($description) < 2) {
        echo "Error: description must be at least 2 characters";
        exit;
    }

    if (!preg_match("/^[0-9]{4}-(0[1-9]1[0-2]-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dueDate)) {
        echo "Error: date must be in format YYYY-MM-DD";
        exit;
    }
    
    // insert input data into DB
    $sql = sprintf ("INSERT INTO todoitem VALUES (NULL, '%s', '%s', '%s')", 
            mysqli_escape_string($conn, $description),
            mysqli_escape_string($conn, $dueDate),
            $isDone);
    
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error executing query [ $sql ] :" . mysqli_error($conn);
        exit;
        // echo + exit SAME AS die
    }
}

