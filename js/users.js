$(document).ready(function () {

    $("#create_user").click(function () {
        $.ajax({
            contentType: "application/json",
            type: "POST",
            url: "../api/users/Post.php",
            data: JSON.stringify({
                username: $("#form_username").val(),
                password: $("#form_password").val()
            }),
            success: function (data) {
                alert('user created');
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $("#update_user").click(function () {
        $.ajax({
            contentType: "application/json",
            type: "POST",
            url: '../api/users/Update.php?username=' + $("#form_old_username").val(),
            data: JSON.stringify({
                username: $("#form_new_username").val(),
                password: $("#form_new_password").val(),
            }),
            success: function (data) {
                alert('user updated');
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $("#delete_user").click(function () {
        $.ajax({
            contentType: "application/json",
            type: "DELETE",
            url: "../api/users/Delete.php",
            data: JSON.stringify({
                username: $("#delete_username").val(),
                password: $("#delete_password").val()
            }),
            success: function (data) {
                alert('user deleted');
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $("#get_user_id").click(function () {
        $.ajax({
            contentType: "application/json",
            type: "POST",
            url: "../api/users/GetId.php",
            data: JSON.stringify({
                username: $("#username_for_id").val()
            }),
            success: function (returnedData) {
                $('#get_id').html(returnedData);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $("#create_moderator").click(function () {
        $.ajax({
            contentType: "application/json",
            type: "POST",
            url: "../api/users/CreateModerator.php",
            data: JSON.stringify({
                id: $("#moderator_id").val()
            }),
            success: function (returnedData) {
                $('#return_message_for_moderator').html(returnedData);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

});