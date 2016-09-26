<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <a href="addpic.php">Add picture</a>

        <table border="1">
            <tr><th>#</th><th>Description</th><th>Picture</th></tr>


            <?php
            require_once 'db.php';

            if (isset($_SESSION['user'])) { // if you are login
                echo '<p style="text-align:right;">';
                echo "Welcome " . $_SESSION['user']['email'] . "!";
                echo ' You may <a href="logout.php">Logout</a>' . ' or <a href="addpic.php"> Add a  picture</a>';
                $currentUserId = $_SESSION['user']['ID'];
            } else {
                echo '<p style="text-align:right;">';
                echo "You are not logged in.";
                echo '<a href="login.php"> Login </a> or <a href="register.php">Register</a>';
                $currentUserId = "";
            }



            $sql = "SELECT * FROM pictures";

            $result = mysqli_query($conn, $sql);
            if (!$result) {
                die("Error executing query [ $sql ] :" . mysqli_error($conn));
                exit;
            }

            $dataRows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($dataRows as $row) {

                // TODO htmlentities() or htmlspecialchars()
                $ID = $row['ID'];
                $description = htmlspecialchars($row['description']);
                $imagePath = htmlspecialchars($row['picturePath']);


                echo "<tr><td>$ID</td><td>$description</td><td><a href=\"$imagePath\"> <img src=\"$imagePath\" height='150'></a></td></tr>\n";


                //echo "</tr>\n";
            }
            ?>

        </table>
    </body>
</html>
