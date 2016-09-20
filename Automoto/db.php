<?php

$db_user = "ipd8automoto";
$db_name = "ipd8automoto";
$db_pass = "HwKtJw7aL3jj9s34";

$conn = mysqli_connect("localhost", $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Error connecting to database: " . mysqli_error($conn));
}
