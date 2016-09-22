<?php

    $id = $_GET['id'];
    
    require_once 'db.php';
    
     
    $sql = sprintf("SELECT * FROM student WHERE ID='%d'", mysqli_escape_string($conn, $id));
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error executing query [ $sql ] : " . mysqli_error($conn));
    }
    
    $row = mysqli_fetch_assoc($result);
            
    echo "<p> ID = ".$row["ID"]."</p>\n";
    echo "<p> name = ".$row["name"]."</p>\n";
    echo "<p> age = ".$row["age"]."</p>\n";
    echo "<p> gpa = ".$row["gpa"]."</p>\n";
    echo "<p> has graduated = ".$row["hasGraduated"]."</p>\n";

   
    echo "<a href=\"index.php\">Back to home page</a>\n";
