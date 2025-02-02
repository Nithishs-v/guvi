$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        var formData = {
            fullname: $("input[name='fullname']").val(),
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
            repeat_password: $("input[name='repeat_password']").val(),
            submit: $("input[name='submit']").val()
        };

        $.ajax({
            type: "POST",
            url: "php/register.php",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    alert("Registration successful! Redirecting to login...");
                    window.location.href = "login.html"; // Redirect to login page
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function () {
                alert("Error connecting to the server.");
            }
        });
    });
});
