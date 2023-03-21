<?php

// Establish a connection to the database
include_once("database.php");

$taak = $_POST["taak"];
$deadline = $_POST["deadline"];
$prioriteit = $_POST["prio"];
$omschrijving = $_POST["omschrijving"];
$id = $_POST["TaakID"];

if (!empty($taak)) {
    $stmt = $conn->prepare("UPDATE taken SET TaakNaam=?, Deadline=?, Prioriteit=?, Omschrijving=? WHERE TaakID=?");

    if (!$stmt) {
        echo "Error" . $conn->errorInfo();
    }

    $stmt->bindParam(1, $taak);
    $stmt->bindParam(2, $deadline);
    $stmt->bindParam(3, $prioriteit);
    $stmt->bindParam(4, $omschrijving);
    $stmt->bindParam(5, $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Record succesvol bijgewerkt";
    } else {
        echo "Error" . $stmt->errorInfo();
    }

    $stmt->closeCursor();

} else {
    echo "Error";
}

header("Location: index.php");
exit;

?>