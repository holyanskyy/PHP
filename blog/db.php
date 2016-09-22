<?php
session_start();

$db_user = "blog";
$db_name = "blog";
$db_pass = "vZe7aMp4MaUNMSVY";

$conn = mysqli_connect("localhost", $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Error connecting to database: " . mysqli_error($conn));
}
