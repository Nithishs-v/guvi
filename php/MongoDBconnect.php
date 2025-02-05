<?php

header('Access-Control-Allow-Origin: *');

require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$profiledb = $client->guvi;
$userCollection = $profiledb->profile;

// Check if form data is submitted
if (isset($_POST['username'], $_POST['phoneNumber'], $_POST['age'], $_POST['dob'], $_POST['email'])) {
    
    $email = $_POST['email'];
    
    // Check if the user already exists based on email id
    $existingUser = $userCollection->findOne(['email' => $email]);

    if ($existingUser) {
        // Update user information if emailid is exists
        $userCollection->updateOne(
            ['email' => $email], // Filter by emailid
            ['$set' => [
                'username' => $_POST['username'],
                'phoneNumber' => $_POST['phoneNumber'],
                'age' => $_POST['age'],
                'dob' => $_POST['dob']
            ]]
        );
        echo "<h3>Profile updated successfully!</h3>";
    } else {
        // Insert new user if email doesn't exist
        $userCollection->insertOne([
            'username' => $_POST['username'],
            'phoneNumber' => $_POST['phoneNumber'],
            'age' => $_POST['age'],
            'dob' => $_POST['dob'],
            'email' => $_POST['email'],
        ]);
        echo "<h3>Successfully registered! Thank you.</h3>";
    }
    
    // Fetch and display all users
    $users = $userCollection->find();

    echo "<h3>Registered Users:</h3>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr>
            <th>Username</th>
            <th>Phone Number</th>
            <th>Age</th>
            <th>Date of Birth</th>
            <th>Email</th>
          </tr>";

    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($user['username']) . "</td>";
        echo "<td>" . htmlspecialchars($user['phoneNumber']) . "</td>";
        echo "<td>" . htmlspecialchars($user['age']) . "</td>";
        echo "<td>" . htmlspecialchars($user['dob']) . "</td>";
        echo "<td>" . htmlspecialchars($user['email']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "Required form fields are missing!";
}

?>

