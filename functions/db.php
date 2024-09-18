<?php

try {
    $host = "localhost";
    $dbname = "techcareer";
    $username = "root";
    $password = "";
    
    $connect = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>
