<?php

include_once("database.php");

// Hier maken we de delete query klaar met een prepared statement:
$stmt = $conn->prepare("DELETE FROM taken WHERE TaakID = :taskid");

// Hier wordt de variable defined om "ID" te kunnen "pakken"
$id = $_GET["TaakID"];

$stmt->bindParam(':taskid', $id);

// Voer de query uit
$stmt->execute();

header("Location: index.php");
exit;

?>