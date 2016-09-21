<?php


    $id = $_GET['id'];
    
    require_once 'db.php';
    
        
    $sql = sprintf("SELECT * FROM student WHERE ID='%d'", mysqli_escape_string($conn, $id));
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error executing query [ $sql ] : " . mysqli_error($conn));
    }
    
    $row = mysqli_fetch_assoc($result);
            
    echo $row["ID"];
    echo $row["name"];
    echo $row["age"];
    echo $row["gpa"];
    echo $row["hasGraduated"];

   
    echo "<a href=\"index.php\">Click to continue</a>\n";
