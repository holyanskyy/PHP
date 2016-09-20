<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ToDo</title>
    </head>
    <body>
        <a href="add.php" >Add item</a>

        <?php
        require_once 'db.php';

        $sql = "SELECT * FROM todoitem";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Error executing query [ $sql ] :" . mysqli_error($conn);
            exit;
        }

        echo "<table border=1>";
        echo "<tr><th>#</th><th>description</th><th>dueDate</th><th>isDone</th></tr>\n";

        $dataRows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($dataRows as $row) {

            // TODO htmlentities() or htmlspecialchars()
            $ID = $row['ID'];
            $description = htmlspecialchars($row['description']);
            $dueDate = htmlspecialchars($row['dueDate']);
            $isDone = $row['isDone'];


            echo "<tr><td>$ID</td><td>$description</td><td>$dueDate</td><td>$isDone</td></tr>\n";
        }

        echo "</table>\n\n";
        ?>

    </body>
</html>
