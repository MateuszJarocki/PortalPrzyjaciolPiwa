<?php
require("menu.php");
$idUzytkownika = $_SESSION['id'];
$sql = "SELECT p.id, p.nazwa, p.obrazek FROM piwo p, ulubione u WHERE u.idPiwa = p.id AND u.idUzytkownika = $idUzytkownika";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ulubione Piwka</title>
    
    <link rel="stylesheet" href="piwo.css">
</head>
<body>
    <section>
    <h1>Ulubione Piwka</h1>
    <table>
        <?php
        if ($result->num_rows > 0) {
            
                echo "<table>";
        while ($row = $result->fetch_object()) {
            echo "<tr>";
            echo "<td><img src='obrazki/{$row->obrazek}' alt='{$row->nazwa}' width='100'></td>";
            echo "<td><a href='details.php?id={$row->id}'>{$row->nazwa}</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        } else {
            echo "<tr><td colspan='2'>Brak ulubionych</td></tr>";
}
?>
</table>
</section>
</body>
</html