<?php

$db_user = "ipd8todoitem";
$db_name = "ipd8todoitem";
$db_pass = "85LPXQcqLbeJjLb6";

$conn = mysqli_connect("localhost", $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Error connecting to database: " . mysqli_error($conn));
}

