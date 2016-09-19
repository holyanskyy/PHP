
<?php

$db_user = "ipd8people";
$db_name = "ipd8people";
$db_pass = "nHpEpeYbY8MtjHzX";

$conn = mysqli_connect("localhost", $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Error connecting to database: " . mysqli_error($conn));
}

if (!isset($_GET["name"]) || !isset($_GET["age"])) {

    echo "Error: name and age must be provided";
} else {
    $name = $_GET["name"];
    $age = $_GET["age"];


    if (empty($name)) {
        echo "error: name must not be empty";
        exit;
    }

    if (empty($age)) {
        echo "error: age must not be empty";
        exit;
    }

    echo "Hello $name! You are $age years old.";
    
    //PREVENTING FROM INJECTION (STEALING AND INJECTION DATA)
    // DO NOT GET FIRED OVER FORGETING TO ESCAPE STRING!!!
    /*
     $sql = sprintf ("INSERT INTO person VALUES (NULL, '%s', '%s')", 
            mysqli_escape_string($conn, $name),
            mysqli_escape_string($conn, $age));
     */
     
    // ALTERNATIVE

    $sql = "INSERT INTO person VALUES (NULL, ' " . mysqli_escape_string($conn, $name) . " ', ' ". mysqli_escape_string($conn, $age). " ')";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error executing query [ $sql ] :" . mysqli_error($conn);
        exit;
        // echo + exit SAME AS die
    }
}





