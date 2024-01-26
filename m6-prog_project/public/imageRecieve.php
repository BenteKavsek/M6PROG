<?php

require_once("../source/database.php");
require_once("../source/config.php");

$connectie = database_connect();

function handleFile($file, $link){
    $location = $file['tmp_name'];
    $ext = ".png";
}

function insertImageInDb($connectie, $type, $filename, $link){
    $stmt = $connectie->prepare("INSERT INTO imageTable (`type`, `fileNaam`, `fileLink`) VALUES(?, ?, ?);");
    $stmt->bind_param("sss", $type, $filename, $link);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

$response = [   "succeeded" => false,
                "message" => "",
                "downloadlink" => null];

$file = $_FILES["image" ];
if($file["error"] == 0 ){

    $link = uniqid();
    $response["succeeded"] = handleFile($file,  $link);
    $result = insertImageInDb($connectie, $file['type'], $file['tmp_name'], $link);
    $downloadLink =  createLink($link);
        if($result) {
            $response["succeeded"] = true;
            $response["downloadlink"] = $downloadLink;
    
        }

        else{
            $response["message"] = "Error inserting image into database.";
        }
    }

else{
    $response["message"] = "Error during upload: " . $file["error"];
}

function createLink($fileid){
    $link = $_SERVER['HTTP_HOST']. "/imagedownload.php?link=$fileid";
    return $link;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);