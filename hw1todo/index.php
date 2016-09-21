<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ToDo</title>
    </head>
    <body>
        <a href="add.php" >Add item</a><br/>

        <table border=1>
            <tr><th>&nbsp;&nbsp; #&nbsp;&nbsp; </th><th>&nbsp;Description&nbsp;</th><th>&nbsp;Due Date&nbsp;</th><th>&nbsp;Is Done&nbsp;</th></tr>  

            <?php
            require_once 'db.php';

            $sql = "SELECT * FROM todoitem";

            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo "Error executing query [ $sql ] :" . mysqli_error($conn);
                exit;
            }



            $dataRows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($dataRows as $row) {

                // TODO htmlentities() or htmlspecialchars()
                $ID = $row['ID'];
                $description = htmlspecialchars($row['description']);
                $dueDate = htmlspecialchars($row['dueDate']);
                $isDone = $row['isDone'];


                echo "<tr><td>$ID</td><td>$description</td><td>$dueDate</td><td>$isDone</td></tr>\n";
            }
            ?>
        </table>
    </body>
</html>
