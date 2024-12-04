<?php

require_once __DIR__ . '/vendor/autoload.php';
//mongoDB connection parameters
$mongoUri = 'mongodb+srv://admin:EI0BpM2D328d6Ry8@cluster0.i7bwr.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0';


try {
  // Connect to MongoDB Atlas
  $mongo_client = new MongoDB\Client($mongoUri);

  //Select your database
  $database = $mongo_client->selectDatabase('mydatabase');

  //Select your collection
  $collection = $database->selectCollection('users');

  //Example: Inserting a document
  $insertResult = $collection->insertOne([
    'UserId' => 3,
    'firstName' => 'Pamela',
    'Surname' => 'Mardones',
    'Gender' => 'Female',
    'Age' => 34,
    'Email' => 'pamguicha@example.com'
  ]);

  // Output the inserted document ID
  echo 'Inserted document ID: ' . $insertResult->getInsertedId();
} catch (Exception $e) {
  echo "MongoDB Exception: " . $e->getMessage();
}

