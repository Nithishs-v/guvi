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
        // Update user information if email exists
        $userCollection->updateOne(
            ['email' => $email], // Filter by email
            ['$set' => [
                'username' => $_POST['username'],
                'phoneNumber' => $_POST['phoneNumber'],
                'age' => $_POST['age'],
                'dob' => $_POST['dob']
            ]]
        );
        echo "Profile updated successfully!";
    } else {
        // Insert new user if email doesn't exist
        $userCollection->insertOne([
            'username' => $_POST['username'],
            'phoneNumber' => $_POST['phoneNumber'],
            'age' => $_POST['age'],
            'dob' => $_POST['dob'],
            'email' => $_POST['email'],
        ]);
        echo "Successfully registered! Thank you.";
    }
} else {
    echo "Required form fields are missing!";
}

?>
