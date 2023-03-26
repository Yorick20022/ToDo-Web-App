<?php

// Establish a connection to the database
include_once("database.php");

$EditID = $_GET["TaakID"];
$taak = $_POST["taak"];
$prioriteit = $_POST["prio"];
$deadline = $_POST["deadline"];
$omschrijving = $_POST["omschrijving"];
$categorie = $_GET["categorie"];

if (!empty($taak)) {
    $stmt = $conn->prepare("UPDATE taken SET TaakNaam=?, Prioriteit=?, Deadline=?, Omschrijving=?, CategorieID=?  WHERE TaakID=?");

    if (!$stmt) {
        echo "Error" . $conn->errorInfo();
    }

    $stmt->bindParam(1, $taak);
    $stmt->bindParam(2, $prioriteit);
    $stmt->bindParam(3, $deadline);
    $stmt->bindParam(4, $omschrijving);
    $stmt->bindParam(5, $categorie);
    $stmt->bindParam(6, $EditID);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        echo "Record succesvol bijgewerkt";
        echo "<br>";
        echo $taak;
        echo "<br>";
        echo $prioriteit;
        echo "<br>";
        echo $deadline;
        echo "<br>";
        echo $omschrijving;
        echo "<br>";
        echo $categorie;
        echo "<br>";
        echo "id: $EditID";


    } else {
        echo "Error";
    }

    $stmt->closeCursor();

} else {
    echo "Error";
}

// header("Location: index.php");
// exit;

?>