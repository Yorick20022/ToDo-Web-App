<?php

// Establish a connection to the database
include_once("database.php");

$EditID = $_GET["TaakID"];
$taak = $_POST["taak"];
$prioriteit = $_POST["prio"];
$deadline = $_POST["deadline"];
$omschrijving = $_POST["omschrijving"];
$categorie = $_POST["categorie"];

if (!empty($taak)) {
    // Check if the category already exists in the categorie table
    $stmt = $conn->prepare("SELECT CategorieID FROM categorie WHERE CategorieNaam = ?");
    $stmt->execute([$categorie]);

    if ($stmt->rowCount() > 0) {
        // If the category already exists, get its existing CategorieID
        $row = $stmt->fetch();
        $categorieID = $row["CategorieID"];
    } else {
        // If the category doesn't exist, insert it into the categorie table
        $stmt = $conn->prepare("INSERT INTO categorie (CategorieNaam) VALUES (?)");
        $stmt->execute([$categorie]);

        // Get the newly generated CategorieID value
        $categorieID = $conn->lastInsertId();
    }

    // Update the taken table with the new values and generated CategorieID
    $stmt = $conn->prepare("UPDATE taken SET TaakNaam=?, Prioriteit=?, Deadline=?, Omschrijving=?, CategorieID=? WHERE TaakID=?");

    if (!$stmt) {
        echo "Error" . $conn->errorInfo();
    }

    $stmt->bindParam(1, $taak);
    $stmt->bindParam(2, $prioriteit);
    $stmt->bindParam(3, $deadline);
    $stmt->bindParam(4, $omschrijving);
    $stmt->bindParam(5, $categorieID);
    $stmt->bindParam(6, $EditID);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
        echo "Record succesvol bijgewerkt";
        echo "<br>";
        var_dump($categorie);


    } else {
        echo "Error";
    }

    $stmt->closeCursor();

} else {
    echo "Error";
}

header("Location: index.php");
exit;

?>