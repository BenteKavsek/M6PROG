<?php

$naam = $_POST['naam'];
$straat = $_POST['straat'];
$huisnmmr = $_POST['huisnmmr'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];


//NAAM
echo '<b>Naam: </b>';
    if (empty( $_POST['naam'])) {
        echo '<b style="color:#f00;">Je naam mag niet leeg zijn!</b>';
    }
echo $naam . '<br>';


//STRAAT
echo '<b>Straat: </b>';
    if (empty( $_POST['straat'])) {
        echo '<b style="color:#f00;">Je straat mag niet leeg zijn!</b>';
    }
echo $straat . '<br>';


//HUISNUMMER
echo '<b>Huisnummer: </b>';
    if (empty( $_POST['huisnmmr'])) {
        echo '<b style="color:#f00;">Je huisnummer mag niet leeg zijn!</b>';
    }
echo $huisnmmr . '<br>';


//POSTCODE
echo '<b>Postcode: </b>';
    if (empty( $_POST['postcode'])) {
        echo '<b style="color:#f00;">Je postcode mag niet leeg zijn!</b>';
    }
echo $postcode . '<br>';


//EMAIL
echo '<b>Email: </b>';
    if (empty( $_POST['email'])) {
        echo '<b style="color:#f00;">Je email mag niet leeg zijn!</b>';
    }
echo $email . '<br>';
?>