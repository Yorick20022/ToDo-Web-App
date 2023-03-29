<?php
include_once("database.php");

// Get the task ID from the URL parameter
$id = $_GET["TaakID"];

// Create a prepared statement to select the task to be deleted
$stmt = $conn->prepare("SELECT * FROM taken WHERE TaakID = :taskid");
$stmt->bindParam(':taskid', $id);
$stmt->execute();

// Get the task data
$task = $stmt->fetch(PDO::FETCH_ASSOC);

// Create a prepared statement to insert the task into the deleted tasks table
$stmt = $conn->prepare("INSERT INTO afgerond (TaakNaam) VALUES (:taskname)");
$stmt->bindParam(':taskname', $task['TaakNaam']);
$stmt->execute();

// Create a prepared statement to delete the task from the original table
$stmt = $conn->prepare("DELETE FROM taken WHERE TaakID = :taskid");
$stmt->bindParam(':taskid', $id);
$stmt->execute();

header("Location: index.php");
exit;
