<?php

include_once("database.php");


$sql = "SELECT * FROM afgerond";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="afgerond.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <title>ToDo</title>
</head>

<body style="background-color:#1E1E1E;">
    <?php if (count($result) > 0): ?>
        <div class="tableDiv">
            <table>
                <thead>
                    <i onclick="homePage()" class="fa-solid fa-arrow-left"></i>
                    <tr>
                        <th style="font-family: 'Inter';">Taak:</th>
                        <th style="font-family: 'Inter';">Omschrijving:</th>
                        <th style="font-family: 'Inter';">Afgerond op:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row): ?>
                        <tr>
                            <td style="font-family:'Inter';">
                                <?= $row['TaakNaam'] ?>
                            </td>
                            <td style="font-family:'Inter';">
                                <?= $row['TaakOmschrijving'] ?>
                            </td>
                            <td style="font-family:'Inter';">
                                <?= $row['afgerondOp'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="no-tasks">No tasks found.</p>
    <?php endif; ?>
</body>

<script src="afgerond.js"></script>

</html>