<?php

include_once("database.php");

$taak = $_POST["taak"];
$deadline = $_POST["deadline"];
$prioriteit = $_POST["prio"];
$omschrijving = $_POST["omschrijving"];
$categorie = $_POST["categorie"];

if (!empty($categorie)) {
    $stmt = $conn->prepare("INSERT INTO taken (TaakNaam, Deadline, Prioriteit, Omschrijving, CategorieID)
    VALUES (?, ?, ?, ?, 
            (SELECT CategorieID FROM categorie WHERE CategorieNaam = ?));");

    $stmt->bindParam(1, $taak);
    $stmt->bindParam(2, $deadline);
    $stmt->bindParam(3, $prioriteit);
    $stmt->bindParam(4, $omschrijving);
    $stmt->bindParam(5, $categorie);

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