<?php

require_once '../source/config.php';
require_once SOURCE_ROOT . 'database.php';

$connection = database_connect();

$plaats = $_GET['plaats'];

if($plaats == null){
};

$sql = 'SELECT * FROM weersomstandighedenPerDag WHERE plaats=? ORDER BY Datum'; 

$stmt = $connection->prepare($sql);

$stmt->bind_param('s', $plaats);

$stmt->execute();

$result = $stmt->get_result();


while ($weersomstandigheden = mysqli_fetch_assoc($result)){
    echo '<pre>';
    var_dump( $_GET );
    echo '</pre>';
    echo '<p> Stad: ' . $weersomstandigheden['plaats'] . '</p>';
    echo '<p> Datum: ' . $weersomstandigheden['datum'] . '</p>';
    echo '<p> Aantal graden: ' . $weersomstandigheden['aantalGraden'] . '</p>';
    echo '<p> Windkracht: ' . $weersomstandigheden['windKracht'] . '</p>';
    echo '<p> Regen in milimeters: ' . $weersomstandigheden['regenInMilimeters'] . '</p>';
};

?>