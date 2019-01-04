<?php

$access_token = $_POST['access_token'];
$newImageURL = $_POST['newImageURL'];
$uploadLink = $_POST['uploadLink'];

$imageData = file_get_contents($newImageURL);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $uploadLink."?access_token=".$access_token);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: image/*"));
curl_setopt($ch, CURLOPT_POSTFIELDS, $imageData);
$response = curl_exec($ch);
curl_close($ch);
echo $response;

?>