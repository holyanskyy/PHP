<?php

$db_user = "root";
$db_name = "todoitem";
$db_pass = "nHpEpeYbY8MtjHzX";

$conn = mysqli_connect("localhost", $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Error connecting to database: " . mysqli_error($conn));
}
