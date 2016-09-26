<?php

session_start();

$db_user = "quiz2gallery";
$db_name = "quiz2gallery";
$db_pass = "5U2Q8T94bUVtEzqb";

$conn = mysqli_connect("localhost", $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Error connecting to database: " . mysqli_error($conn));
}
