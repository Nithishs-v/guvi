<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$profiledb = $client->guvi;
$userCollection = $profiledb->profile;

// Check if form data is submitted
if (isset($_POST['username'], $_POST['phoneNumber'], $_POST['age'], $_POST['dob'], $_POST['email'])) {
    $username = $_POST['username'];
    $phoneNumber = $_POST['phoneNumber'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];

    // Update the user profile based on username
    $updateResult = $userCollection->updateOne(
        ['username' => $username],
        ['$set' => [
            'phoneNumber' => $phoneNumber,
            'age' => $age,
            'dob' => $dob,
            'email' => $email
        ]]
    );

    if ($updateResult->getMatchedCount() > 0) {
        if ($updateResult->getModifiedCount() > 0) {
            echo json_encode(['message' => 'Profile updated successfully.']);
        } else {
            echo json_encode(['message' => 'No changes made to the profile.']);
        }
    } else {
        echo json_encode(['message' => 'User not found!']);
    }
} else {
    echo json_encode(['message' => 'Required form fields are missing!']);
}
?>
