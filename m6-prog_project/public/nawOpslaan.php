<?php

require_once '../source/config.php';
require_once SOURCE_ROOT . 'database.php';

$conn = database_connect();

$data = file_get_contents('php://input');
$json = json_decode($data);
$result = $stmt->execute();
$response=["succeeded" => $result];

header('Content-Type: application/json');
echo json_encode($response);

$q = "INSERT INTO naw (naam, straat, huisnummer, postcode, email) VALUES (?, ?, ?, ?, ?);";
$stmt = $conn->prepare($q);
$stmt->bind_param(
    "sssss",
    $json->name,
    $json->straat,
    $json->huisnmmr,
    $json->postcode,
    $json->email
);
$stmt->execute();
