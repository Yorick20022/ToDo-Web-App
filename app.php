<?php

include_once("database.php");

$taak = $_POST["taak"];
$deadline = $_POST["deadline"];
$prioriteit = $_POST["prio"];
$omschrijving = $_POST["omschrijving"];
$id = $_POST["TaakID"];

if (!empty($taak)) {
    $stmt = $conn->prepare("INSERT INTO taken (TaakID, TaakNaam, Deadline, Prioriteit, Omschrijving) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $taak);
    $stmt->bindParam(3, $deadline);
    $stmt->bindParam(4, $prioriteit);
    $stmt->bindParam(5, $omschrijving);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Record succesvol toegevoegd";
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