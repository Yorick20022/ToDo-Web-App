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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <title>ToDo</title>
</head>

<body>
    <div class="tasksMain">
        <?php if (count($result) > 0) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Taak</th>
                        <th>Omschrijving</th>
                        <th>Afgerond op:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td style="color:aliceblue"><?= $row['TaakNaam'] ?></td>
                            <td style="color:aliceblue"><?= $row['TaakOmschrijving'] ?></td>
                            <td style="color:aliceblue"><?= $row['afgerondOp'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="no-tasks">No tasks found.</p>
        <?php endif; ?>
    </div>
</body>

</html>