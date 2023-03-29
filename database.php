<?php

//Hier definen we de informatie over de database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo";

// Verbinding maken met de DB
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Onderstaande code zorgt er voor dat er een error wordt gegenereerd zodra de connection niet werkt
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>