<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Blog</title>
    </head>
    <body>
        <div style="width: 800px; margin: 0 auto;">

<?php

require_once 'db.php';




/*
  index.php
  TODO: Add code to fetch the latest 5 articles from database
  and display their titles, author and date of creation.

 */

/* $sql = "SELECT * FROM articles ORDER BY id DESC LIMIT 5";*/
$sql = "SELECT articles.ID AS articleID, articles.title, users.name, articles.pubDate, users.ID as authorID  FROM articles "
        . "INNER JOIN users ON articles.authorID=users.ID ORDER BY pubDate DESC LIMIT 5";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error executing query [ $sql ] :" . mysqli_error($conn));
    exit;
}

/* OR
 * $numrows= mysqli_num_rows($result);
$dataRows = mysqli_fetch_all($result, MYSQLI_ASSOC);

       
        echo "<pre>\n";
        print_r($dataRows);
        echo "</pre>\n\n";
       
        echo "<ul>";
        foreach ($dataRows as $row) {
            $ID = $row['articleID'];
            $author = htmlspecialchars($row['name']);
            $pubDate = $row['pubDate'];
            $title = htmlspecialchars($row['title']);
            $body = htmlspecialchars($row['body']);

            echo "<li>$title $author $pubDate <a href=\"articleview.php?id=$ID\">View Article</a></li>";
        }
  */      
echo '<h2 style="text-align:center;">Welcome to my blog, read on!</h2><br/>';

echo "<ol>";
while ($row = mysqli_fetch_assoc($result)) {
            $ID = $row['articleID'];
            $title = htmlspecialchars ($row['title']);
            $author = htmlspecialchars ($row['name']);
            $date = $row['pubDate'];
            $authorID = htmlspecialchars ($row['authorID']);
            echo "<li><a href=\"articleview.php?id=$ID\">$title</a>, $author, $date</li>\n";
            
            if ($authorID==$currentUserId){
                echo "<a href=\"articleaddedit.php?id=$ID\">Edit article</a>";
            }
            echo "<br/><hr/>";
        }
        echo "</ol>\n";
        ?>



</div>
</body>
</html>


