<?php
$qry_str = "?x=10&y=20";
$ch = curl_init();

// Set query data here with the URL
curl_setopt($ch, CURLOPT_URL, 'http://localhost:8080/AccountRight/4c4af152-f9d3-41ae-a7df-f67d96242574/Customer/');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, '3');
curl_setopt($ch, CURLOPT_USERPWD, 'administrator' . ":");
$content = trim(curl_exec($ch));
curl_close($ch);
print $content;
