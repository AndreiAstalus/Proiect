$(document).ready(function () {

    $("#create_user").click(function () {
        $.ajax({
            contentType: "application/json",
            type: "POST",
            url: "api/users/Post.php",
            data: JSON.stringify({
                username: $("#form_username").val(),
                password: $("#form_password").val()
            }),
            success: function (data) {
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

});