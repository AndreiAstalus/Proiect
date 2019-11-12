$(document).ready(function () {

    $("#check_user").click(function () {
        $.ajax({
            contentType: "application/json",
            type: "POST",
            url: 'api/users/LogIn.php',
            data: JSON.stringify({
                username: $("#check_username").val(),
                password: $("#check_password").val(),
            }),

            success: function (data) {
                location.href = 'view/Control.php';
            },
            error: function (error) {
                alert('Invalid Credentials');
                console.log(error);
            }
        });
    });

    $("#logout").click(function () {
        console.log("here");

        $.ajax({
            contentType: "application/json",
            type: "POST",
            url: '../api/users/Logout.php',
            data: JSON.stringify({
                username: $("#check_username").val(),
                password: $("#check_password").val(),
            }),
            success: function () {
                location.href = '../index.php';
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

});