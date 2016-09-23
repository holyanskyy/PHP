<?php

require_once 'db.php';

if (isset($_SESSION['user'])) { // if you are login
    echo "Welcome " . $_SESSION['user']['name'] . "!";
    echo ' You may <a href="logout.php">Logout</a>' . ' or <a href="articleaddedit.php">post an article</a>';
} else {
    echo "You are not logged in.";
    echo '<a href="login.php"> Login </a> or <a href="register.php">Register</a>';
}


/*
  index.php

  TODO: Add code to fetch the latest 5 articles from database
  and display their titles, author and date of creation.

 */


$sql = "SELECT articles.title, users.name, articles.created  FROM articles "
        . "INNER JOIN users ON articles.authorID=users.ID ORDER BY created DESC LIMIT 5";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error executing query [ $sql ] :" . mysqli_error($conn));
}

echo "<ol>\n";
while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $name = $row['name'];
            $date = $row['created'];
            echo "<li>$title, $name, $date</li>\n";
        }
echo "</ol>\n";


//echo '<table border="1">';
//echo '<tr><th>Title</th><th>Author</th><th>Date of creation</th></tr>';


/*$dataRows = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($dataRows as $row) {


    $title = $row['ID'];
    $name = htmlspecialchars($row['name']);

    //echo "<tr><td><a href=\"articleview.php?id=$ID\">$ID</a></td><td><a href=\"studentview.php?id=$ID\">$name</a></td>\n";
    //echo "</tr>\n";
}

echo '</table>';*/



