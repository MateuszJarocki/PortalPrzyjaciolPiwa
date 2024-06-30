<?php
require("menu.php");


$login = $_SESSION['login'];

$sql = "SELECT ocena, tresc, data, p.id AS idPiwa, nazwa 
        FROM recenzje r
        JOIN piwo p ON p.id = r.idPiwa
        WHERE nick = '$login'";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Moje Recenzje</title>
    <link rel="stylesheet" href="piwo.css">
</head>
<body>
<section>
    
    <h1>Recenzje</h1>
    <?php

    if ($result->num_rows > 0) {
        echo "****************************************";
        while($row = $result->fetch_assoc()) {
            echo "<div class='review'>";
            echo "<p>Data: " . $row['data'] . "</p>";
            echo "<p>Recenzowane piwo: <a href='details.php?id=" . $row['idPiwa'] . "'>" . $row['nazwa'] . "</a></p>";
            echo "<p>Ocena: " . $row['ocena'] . "</p>";
            echo "<p>Treść: " . $row['tresc'] . "</p>";
            echo "</div>";
            echo "****************************************";
        }
    } else {
    
        echo "<p>Brak recenzji do wyświetlenia.</p>";
    }
    ?>
    </section>
</body>
</html>
