$(document).ready(function () {
    $("form").submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        // Collect form data
        var formData = {
            username: $("#username").val(),
            phoneNumber: $("#phoneNumber").val(),
            age: $("#age").val(),
            dob: $("#dob").val(),
            email: $("#email").val()
        };

        $.ajax({
            type: "POST",
            url: "php/MongoDBconnect.php", // Ensure this is the correct path
            data: JSON.stringify(formData), // Send data as JSON
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    alert("Profile registered successfully!");
                    // Redirect or update UI
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function (xhr, status, error) {
                alert("An error occurred: " + xhr.responseText);
            }
        });
    });
});
