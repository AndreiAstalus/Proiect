<?php
session_start();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Get Users</title>
</head>
<br>

<button id="get" onclick="getUsers()">Get all users</button>
<br><br>

<form action="utils/Postusers.php">
    Username:<br>
    <input type="text" name="username"><br>
    Password:<br>
    <input type="text" name="password"><br><br>

    <input type="submit" value="Submit">

</form>


</body>
</html>

<script>

    function getUsers() {
        window.location = "utils/Getusers.php";
    }

</script>





