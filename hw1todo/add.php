<?php

// heredoc  - way of assigning file


function getForm($de = '', $dd = '', $ii = '') {

    $f = <<< JAMISWEET
<h3>Add Item</h3>

            
        <form method="post">
            Description: <input type="textarea" rows="4" cols="20" name="description" value="$de"><br>
            Due Date: <input type="text" name="dueDate" value="$dd"><br>
            Is Done: <input type="text" name="isDone" value="$ii"><br>
            <input type="submit" value="ADD">
        </form>
      
JAMISWEET;

    return $f;
}

require_once 'db.php';



if (!isset($_POST["description"]) || !isset($_POST["dueDate"]) || !isset($_POST["isDone"])) {

    echo getForm();
} else {

    // receiving a submission
    $description = $_POST["description"];
    $dueDate = $_POST["dueDate"];
    $isDone = $_POST["isDone"];

    // 
    $errorList = array();

    if (strlen($description) < 2) {
        array_push($errorList, "Error: description must be at least 2 characters");
    }

    // !preg_match('/^[0-9]{4}-(0[1-9]1[0-2]-(0[1-9]|[1-2][0-9]|3[0-1]))$/'
    if (!preg_match('/^[A-Z0-9]{3,8}$/', $dueDate)) {
        array_push($errorList, "Error: date must be in format YYYY-MM-DD");
    }
    //

    if ($errorList) {

        //submissions failed - problem found
        echo "<h5>Problems found in your submission</h5>\n";
        echo "<ul>\n";
        foreach ($errorList as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>\n";
        echo getForm($description, $dueDate, $isDone);
    } else {
        // submission succesful
        echo "submission succesful";

        // insert input data into DB
        $sql = sprintf("INSERT INTO todoitem VALUES (NULL, '%s', '%s', '%d')", mysqli_escape_string($conn, $description), mysqli_escape_string($conn, $dueDate), $isDone);

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error executing query [ $sql ] :" . mysqli_error($conn));
        } else {
            echo "<br/><p style='font-weight: bold;' >The data was inserted succesfully.</p><br/>";
        }
        
        
    }
}





