<?php
// API'den veri çek
$apiUrl = 'https://www.freetogame.com/api/games?platform=pc&sort-by=popularity';
$response = file_get_contents($apiUrl);

// CORS sorunu yaşamamak için başlık ekle
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Veriyi geri döndür
echo $response;
?>
