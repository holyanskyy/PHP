<?php

$db_user = "ipd8people";
$db_name = "ipd8people";
$db_pass = "nHpEpeYbY8MtjHzX";

$conn = mysqli_connect("localhost", $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Error connecting to database: " . mysqli_error($conn));
}