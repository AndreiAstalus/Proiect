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
                if(data.trim()==='Login'){
                    location.href='view/Control.php';
                } else {
                    alert('Invalid Credentials');
                    console.log(data);
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});