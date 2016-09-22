<?php

// heredoc  - way of assigning file


function getForm($mm = '', $yy = '', $pp = '') {

    $f = <<< TAGS
<h3>Add Student</h3>
<form method="post">
    Name: <input type="text" name="name" value="$mm"><br><br>
    Age: <input type="number" name="age" value="$yy"><br><br>
    GPA: <input type="text" name="gpa" value="$pp"><br><br>
    Has graduated? <input type="checkbox" name="hasGraduated" value="yes"><br><br>
    <input type="submit" value="ADD">
         
</form>   
TAGS;

    return $f;
}

require_once 'db.php';

/** TRI-STATE FORM
 * 1. First show 
 * 2. Submission Successful
 * 3. (show error list and form again
 * */
// For debugging purposes only - view all submitted values
/*echo "<pre>\n";
print_r($_POST);
echo "</pre>\n\n";
 
 */

if (!isset($_POST['name'])) {
    echo getForm();
} else {
    // Receiving a submission
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gpa = $_POST['gpa'];
    //$hasGraduated = $_POST['hasGraduated'];

    if ($_POST['hasGraduated'] == "yes") {
        $hasGraduated = $_POST['hasGraduated'];
    } else {
        $hasGraduated = 'no';
    }

    //
    $errorList = array();
    if (strlen($name) < 4) {
        array_push($errorList, "Name must be at least 4 characters long");
    }
    if (($age < 1) || ($age > 150)) {
        array_push($errorList, "Age must be between 1 and 150");
    }

    if (($gpa < 0) || ($gpa > 4.3)) {
        array_push($errorList, "GPA must be between 0 and 4.3");
    }

    // NO ENRTY - Assigns 0
    if ($_POST['gpa'] = "") {
        $gpa = 0;
    }



    if ($errorList) {
        // STATE 3: submission failed - problems found
        echo "<h5>Problems found in your submission</h5>\n";
        echo "<ul>\n";
        foreach ($errorList as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>\n";
        echo getForm($name, $age, $gpa);
    } else {
        // STATE 2: submission successful
        echo "Submission successful.<br>";


        $sql = sprintf("INSERT INTO student VALUES (NULL, '%s', '%s', '%d', '%s')", mysqli_escape_string($conn, $name), mysqli_escape_string($conn, $age), mysqli_escape_string($conn, $gpa), mysqli_escape_string($conn, $hasGraduated));

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Error executing query [ $sql ] :" . mysqli_error($conn));
        } else {
            echo "<a href=\"index.php\">Back to home page</a>";
        }
    }
}
