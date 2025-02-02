<?php

header('Access-Control-Allow-Origin: *');

require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

$profiledb = $client->guvi;
$userCollection = $profiledb->profile;

// Check if form data is submitted
if (isset($_POST['username'], $_POST['phoneNumber'], $_POST['age'], $_POST['dob'],$_POST['email'])) {
    // Use $_POST to get the data
    $insertOneResult = $userCollection->insertOne([
        'username' => $_POST['username'],
        'phoneNumber' => $_POST['phoneNumber'],
        'age' => $_POST['age'],
        'dob' => $_POST['dob'],
        'email' => $_POST['email'],
    
    ]);
    echo "successfully registered thank you";
    //printf("Inserted %d documents\n", $insertOneResult->getInsertedCount());
    //var_dump($insertOneResult->getInsertedId());
} else {
    echo "Required form fields are missing!";
}
?>
