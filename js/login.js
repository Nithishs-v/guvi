$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        var formData = {
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
            login: $("input[name='login']").val()
        };

        $.ajax({
            type: "POST",
            url: "php/login.php",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    alert("Login successful!");

                    // Store user data in localStorage (e.g., token, user ID, etc.)
                    localStorage.setItem("userEmail", response.email); // Store email or any identifier
                    localStorage.setItem("userToken", response.token); // Store token if provided (for example)

                    window.location.href = "../profile.html"; // Redirect to profile/dashboard
                } else {
                    alert("Login failed: " + response.message);
                }
            },
            error: function () {
                alert("Error connecting to server.");
            }
        });
    });
});
