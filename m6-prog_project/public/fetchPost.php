<?php

$data = file_get_contents('php://input');
//echo $data;
$json = json_decode($data);
echo $json->maxPrice;

echo '<section>';
echo '<h1>you searched</h1>';
echo '<p>maxprice: <span>' . $json->maxPrice . '</span></p>';
echo '<p>article: <span>' . $json->article . '</span></p>';
echo '</section>'; 
