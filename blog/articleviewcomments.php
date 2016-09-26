<?php

if (!isset($_GET['id'])) {
    die('No article to view');
}
//$id = $_GET['id'];

require_once 'db.php';

function getCommentForm() {
    return <<< ENDTAG
    <div style="width: 800px; margin: 0 auto; border:1px solid lightgrey; padding:5px;">                   
        <form method="post">
            My comment<br><textarea name="body" rows="4" cols="110"></textarea><br><br/>
            <input type="submit" value="Add comment"><br>
        </form>       
    </div>
ENDTAG;
}

if (isset($_SESSION['user'])) {
    echo '<p style="text-align:right;">';
    echo "You are loged as " . $_SESSION['user']['name'] . ". ";
    echo '<a href="logout.php"> Logout</a> <br/></p>';
    $currentUserId = $_SESSION['user']['ID'];
    if (isset($_GET["id"])) {
        $currentArticleID = $_GET["id"];
        if (isset($_POST['body'])) {
            $bodyComment = $_POST['body'];
            $sql = sprintf("INSERT INTO comments VALUES (NULL, '%s', '%s', '%s', NULL )", mysqli_escape_string($conn, $currentArticleID), mysqli_escape_string($conn, $currentUserId), mysqli_escape_string($conn, $bodyComment));
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Error executing query [ $sql ] : " . mysqli_error($conn));
            }
        }
        ShowArticle($_GET["id"], $conn);
    }
    echo getCommentForm();
    ShowComments($_GET["id"], $conn);
} else {
    echo '<p style="text-align:right;">';
    echo "You are not logged in. <br/>";
    echo '<a href="login.php">Login</a> or <a href="register.php">Register</a> to post article and comments.</p>';
    $currentUserId = "";
    if (isset($_GET["id"])) {
        ShowArticle($_GET["id"], $conn);
    }
    echo 'You must <a href="login.php">Login</a> or <a href="register.php">Register</a> to post comments.</p>';
    ShowComments($_GET["id"], $conn);
}

function ShowArticle($articleId, $conn) {
    //require_once 'db.php';    
    $id = $articleId;
    $conn = $conn;

    $sql = sprintf("SELECT * FROM articles, users WHERE authorID=users.ID and articles.ID= '%s'", mysqli_escape_string($conn, $_GET['id']));


    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error executing query [ $sql ] : " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        die("No article was found");
    }
    $ID = $row['ID'];
    $title = htmlspecialchars($row['title']);
    $body = htmlspecialchars($row['body']);
    $authorName = $row['name'];
    $pubDate = $row['pubDate'];
    $imagePath = $row['imagePath'];

    echo "<h3>$title</h3>";
    echo "<p><i>Posted by</i> $authorName at $pubDate</p><br><br><br>";
    echo "<p> Image: ";
    echo "<img src=" . $row['imagePath'] . " height='200'></p>\n";
    echo "<p>$body</p>";

    echo "<a href=\"index.php\">Back to home page</a>\n";
}

function ShowComments($articleId, $conn) {
    $id = $articleId;
    $conn = $conn;
    echo '<h3 style="text-align:left; font_weight:bold;">Previous comments</h3>';
    $articleID = $_GET["id"];
    //echo $id;
    $sql = "SELECT users.name as name,comments.body as body,comments.pubTimestamp as date,comments.ID FROM comments,users WHERE comments.articleID='$articleID' and comments.authorID=users.ID ORDER BY comments.ID DESC";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error executing query [$sql] : " . mysql_error($conn));
    }
    $dataRows = mysqli_fetch_all($result);
    //print_r($dataRows);
    foreach ($dataRows as $row) {
        //$ID=htmlspecialchars($row[0]);
        $author = htmlspecialchars($row[0]);
        $body = htmlspecialchars($row[1]);
        $pubTimestamp = $row[2];
        echo '<p style="font-style:italic;font-size:90%;">' . $author . ' said  on ' . $pubTimestamp . '</p>';
        echo '<p style="padding:10px;" >' . $body . '</p><hr/>';
    }
}
