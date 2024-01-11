<?php

include_once("../source/database.php");

$searchInput = isset($_GET['searchPersoon']) ? $_GET['searchPersoon'] : '';

$conn = database_connect();
$searchResults = findPersoon($conn,$searchInput);
$conn->close();

echo json_encode($searchResults);

function getQueryResultsAssoc($result)
{
    $results=[];
    if($result)
    {
        for ($i=0; $i < $result->num_rows; $i++)
        {
            $row = $result->fetch_assoc();
            
            array_push($results,$row);
        }
    }

    return $results;
}

function findPersoon($conn,$name)
{
    if($conn)
    {
        try
        {
            $q = "select * from naw where naam = ?;";
            $stmt = $conn->prepare($q);
            $stmt->bind_param("s",$name);
            $stmt->execute();
            $result = $stmt->get_result();

            $searchResults = getQueryResultsAssoc($result);
            return $searchResults;
        }
        catch(ex)
        {
            echo "error during query" . ex;
        }
    }
    return [];
}
 