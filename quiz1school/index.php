<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>School</title>
    </head>
    <body>

        <a href="studentadd.php">Add new student</a>


        <table border="1">
            <tr><th style="width: 20px">#</th><th style="width: 120px">Name</th></tr>
            <?php
            
             require_once 'db.php';
             
            $sql = "SELECT ID,name  FROM student";
            
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                die("Error executing query [ $sql ] :" . mysqli_error($conn));
            }
            
            $dataRows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($dataRows as $row) {

                // TODO htmlentities() or htmlspecialchars()
                $ID = $row['ID'];
                $name = htmlspecialchars($row['name']);
                
                echo "<tr><td><a href=\"studentview.php?id=$ID\">$ID</a></td><td><a href=\"studentview.php?id=$ID\">$name</a></td>\n";
                echo "</tr>\n";
            }

            
            
            ?>

        </table>
    </body>
</html>
