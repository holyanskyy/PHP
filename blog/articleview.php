<?php

/* 
articleview.php?id=7

TODO: Add code to fetch the one article from database
and display it in full (Title, Author name, Date of creation, body).
 */

    $id = $_GET['id'];
    
    require_once 'db.php';
    
     
    $sql = sprintf ("SELECT articles.ID, articles.title, users.name, articles.pubDate, articles.body, articles.imagePath FROM articles "
        . "INNER JOIN users ON articles.authorID=users.ID WHERE articles.ID='%d'", mysqli_escape_string($conn, $id));
    
    //$sql = sprintf("SELECT * FROM articles WHERE ID='%d'", mysqli_escape_string($conn, $id));
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error executing query [ $sql ] : " . mysqli_error($conn));
    }
    
    $row = mysqli_fetch_assoc($result);
            
    //echo "<p> ID = ".$row["ID"]."</p>\n";
    echo "<p> Title: ".$row["title"]."</p>\n";
    echo "<p> Author name: ".$row["name"]."</p>\n";
    echo "<p> Date of creation: ".$row["pubDate"]."</p>\n";
    echo "<p> Body: ".$row["body"]."</p>\n";
    echo "<p> Image: ";
    echo "<img src=" . $row['imagePath']. " height='200' width='200'></p>\n";

   
    echo "<a href=\"index.php\">Back to home page</a>\n";

