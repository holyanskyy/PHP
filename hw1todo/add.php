<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add</title>
    </head>
    <body>
        <form method="post" action="receiver.php" >
            Description: <input type="textarea" rows="4" cols="20" name="description"><br>
            Due Date: <input type="text" name="dueDate"><br>
            Is Done: <input type="text" name="isDone">
            <input type="submit" value="ADD">
        </form>
    </body>
</html>
