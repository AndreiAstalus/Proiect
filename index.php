<?php
session_start();
if (!empty($_SESSION['message'])) {
    echo '<p class="message"> '.$_SESSION['message'].'</p>';
    unset($_SESSION['message']);
}
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Get Users</title>

    <!-- javascript -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/users.js"></script>
    <script src="js/login.js"></script>

</head>
<br>
<body>

Log In:

<br><br>

<label>Username:</label>
<input type="text" name="username" id="check_username" value="">

<br><br>

<label>Password:</label>
<input type="password" name="password" id="check_password" value="">

<br><br>

<input id="check_user" type="button" value="Log In">

<br><br>

</body>
</html>







