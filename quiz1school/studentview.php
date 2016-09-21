<?php


function getForm($iii) {
    $f = <<< ENDTAG
        <p>Are you sure you want to see student record number $iii ?</p>
        
        <form action="index.php">
            <input type="submit" value="Cancel">
        </form>
        
        <form>
            <input type="hidden" name="id" value="$iii">
            <input type="hidden" name="confirmed" value="yes">
            <input type="submit" value="View">
        </form>
ENDTAG;
    return $f;
}

if (isset($_GET['confirmed'])) {
    $id = $_GET['id'];
    
    require_once 'db.php';
    
       
    
    $sql = sprintf("SELECT FROM student WHERE ID='%d'", mysqli_escape_string($conn, $id));
    
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Error executing query [ $sql ] : " . mysqli_error($conn));
    }
    
    while ($row = mysql_fetch_assoc($result)) {
    echo $row["id"];
    echo $row["name"];
    echo $row["age"];
    echo $row["gpa"];
    echo $row["graduated"];
}

mysql_free_result($result);
    
    echo "<a href=\"index.php\">Click to continue</a>\n";
} else {
    
    echo getForm($_GET['id']);
}