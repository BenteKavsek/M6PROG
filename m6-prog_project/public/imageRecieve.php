<?php

require_once("../source/database.php");
require_once("../source/config.php");

function handleFile($file){
    $connectie = database_connect();
    $link = uniqid();
    $location = $file['tmp_name'];
    $ext = ".png";
    $filename = "../uploads/$link$ext";
    move_uploaded_file($location, $filename);
    return $link;
}

function insertImageInDb($type, $filename, $link){
    $connectie = database_connect();
    $stmt = $connectie->prepare("INSERT INTO imageTable (`type`, `fileNaam`, `fileLink`) VALUES(?, ?, ?);");
    $stmt->bind_param("sss", $type, $filename, $link);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

$response = ["succeeded" => false, "message" => ""];

$file = $_FILES["image"];
if($file["error"] == 0)
{
    $link = handleFile($file);
    $result = insertImageInDb($file['type'], $file['tmp_name'], $link);
    if($result) {
        $response["succeeded"] = true;
    } else {
        $response["message"] = "Error inserting image into database.";
    }
}
else{
    $response["message"] = "Error during upload: " . $file["error"];
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);