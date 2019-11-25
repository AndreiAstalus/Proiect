<?php
    require "../hook/AuthHook.php";

    $auth = new AuthHook();
    $auth->checkAuth();

if (!empty($_SESSION['message2'])) {
    echo '<p class="message"> '.$_SESSION['message2'].'</p>';
    unset($_SESSION['message2']);
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Get Users</title>

    <!-- javascript -->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/users.js"></script>
    <script src="../js/login.js"></script>

</head>
<br>
<body>

Get all users:

<button id="get" onclick="getUsers()">Get all users</button>
<br><br>

Get user id:
<br><br>
<input type="text" name="username_for_id" id="username_for_id" value="">

<br><br>
<input id="get_user_id" type="button" value="Get user id">

<br><br>

<div id="get_id"></div>

<br><br>

Create a new user:
<br><br>

<label>Username:</label>
<input type="text" name="username" id="form_username" value="">

<br><br>

<label>Password:</label>
<input type="password" name="password" id="form_password" value="">

<br><br>

<input id="create_user" type="button" value="Create user">

<br><br>

Update user:

<br><br>

<label>New username:</label>
<input type="text" name="username" id="form_new_username" value="">

<br><br>

<label>New password:</label>
<input type="password" name="password" id="form_new_password" value="">

<br><br>

<label>Old username:</label>
<input type="text" name="username" id="form_old_username" value="">

<br><br>

<input id="update_user" type="button" value="Update user">

<br><br>

Delete user:

<br><br>

<label>Username:</label>
<input type="text" name="username" id="delete_username" value="">

<br><br>

<label>Password:</label>
<input type="password" name="password" id="delete_password" value="">

<br><br>

<input id="delete_user" type="button" value="Delete user">

<br><br>
Create forum moderator (by inserting user id):
<br><br>

<input type="text" name="moderator_id" id="moderator_id" value="">

<br><br>

<input id="create_moderator" type="button" value="Create moderator">

<br><br>

<div id="return_message_for_moderator"></div>

<br><br>

<input id="logout" type="button" value="Logout">

<br><br>


</body>
</html>

<script>
    function getUsers() {
        window.location = "../api/users/Get.php";
    }
</script>
