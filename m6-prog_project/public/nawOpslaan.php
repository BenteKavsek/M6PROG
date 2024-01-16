<?php

require_once '../source/config.php';
require_once SOURCE_ROOT . 'database.php';

$conn = database_connect();

$data = file_get_contents('php://input');
$json = json_decode($data);

$sqp = 'SELECT COUNT(1) as count FROM naw WHERE email=?;';
$stmt = $conn->prepare($sqp);
$stmt->bind_param("s",$json->email);
$stmt->execute();
$result = $stmt->get_result();
$count = mysqli_fetch_assoc($result);

if ($count['count'] > 0) {
    echo json_encode([
        'success' => false,
        'count' => $count['count'],
        'error' => 'Dit email adres komt al voor in de database'
    ]);
    return false;

}

$response=["succeeded" => $result];

header('Content-Type: application/json');
echo json_encode($response);


$q = "INSERT INTO naw (naam, straat, huisnummer, postcode, email) VALUES (?, ?, ?, ?, ?);";
$stmt->bind_param(
    "sssss",
    $json->name,
    $json->straat,
    $json->huisnmmr,
    $json->postcode,
    $json->email
);
$stmt->execute();
