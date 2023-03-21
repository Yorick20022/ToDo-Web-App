<?php

include_once("database.php");

$sql = "SELECT TaakID, TaakNaam, Deadline, Prioriteit, Omschrijving FROM taken";
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
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <title>ToDo</title>
</head>

<body>
    <br><br><br>
    <div class="main">
        <br>
        <h1>TODO</h1>
        <div class="orangebox">
            <p1 class="tasktext">Nieuwe Taak</p1>
            <i class="fa-sharp fa-solid fa-plus"></i>
        </div>

        <h1 class="tasksText">Taken:</h1>
        <input type="text" id="search" onkeyup="searchTable()" name="taak" class="search" placeholder="Zoeken">
        <br><br>
        <div class='tasksMain'>
            <?php if (count($result) > 0): ?>
                <?php foreach ($result as $row): ?>
                    <div class="tasks searchable-task" id="<?= $row['TaakID'] ?>">
                        <p3 class="deadlinePos">
                            <?= $row['Deadline'] ?>
                        </p3>
                        <p1 class="taakPos">
                            <?= $row['TaakNaam'] ?>
                        </p1>
                        <p1 class="omschrijvingPos">
                            <?= $row['Omschrijving'] ?>
                        </p1>
                        <div class="divid">
                            <input type="hidden" name="TaakID" value="<?= $row['TaakID'] ?>">
                            </form>
                            <a href="delete-process.php?TaakID=<?= $row['TaakID'] ?>" class="delete-icon" title="Done">
                                <i class="fa-solid fa-circle-check"></i>
                            </a>
                            <i class="fa-solid fa-pen-to-square" onclick="someFunc()"></i>
                        </div>
                    </div>
                    <br>
                    <dialog class="TodoModal" id="EditModal">
                        <i id="closeEdit" class="fa-solid fa-xmark" onclick="someFunc2()"></i>
                        <h1 class="newNote">Bewerk taak</h1>
                        <div class="boxes">
                            <form method="post" action="update-process.php?TaakID=<?= $row['TaakID'] ?>">
                                <input type="text" name="taak" maxlength="15" class="title" placeholder="Taak">
                                <br>
                                <select name="prio" id="prio" class="prioriteit">
                                    <option value="" disabled selected>Prioriteit</option>
                                    <option value="laag">Laag</option>
                                    <option value="normaal">Normaal</option>
                                    <option value="hoog">Hoog</option>
                                </select>
                                <input type="date" name="deadline" class="due" placeholder="Due date">
                                <textarea name="omschrijving" maxlength="90" cols="30" placeholder="Omschrijving" rows="5"
                                    class="textarea" value="test" style="resize: none;"></textarea>
                                <input type="submit" class="button" value="Save">
                            </form>
                        </div>
                    </dialog>

                <?php endforeach; ?>
            <?php endif; ?>



        </div>

        <dialog class="TodoModal" id="TodoModal">
            <i id="close" class="fa-solid fa-xmark"></i>
            <h1 class="newNote">Nieuwe taak</h1>
            <div class="boxes">
                <form method="post" action="app.php">
                    <input type="text" name="taak" maxlength="15" class="title" placeholder="Taak" required>
                    <br>
                    <select name="prio" id="prio" class="prioriteit" required>
                        <option value="" disabled selected>Prioriteit</option>
                        <option value="laag">Laag</option>
                        <option value="normaal">Normaal</option>
                        <option value="hoog">Hoog</option>
                    </select>
                    <input type="date" name="deadline" class="due" placeholder="Due date" required>
                    <textarea name="omschrijving" maxlength="90" cols="30" placeholder="Omschrijving" rows="5"
                        class="textarea" style="resize: none;" required></textarea>
                    <input type="submit" class="button" value="Save">
                </form>
            </div>
        </dialog>
</body>


<script src=" main.js"></script>

</html>