<?php
require("menu.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="piwo.css">
</head>
<body>
    <section>
    <?php
$conn = new mysqli("localhost", "root", "", "portal");
$sql = "SELECT id, nazwa FROM kategorie";
$result = $conn->query($sql);
echo "<p class='category-links'><a href='index.php'>Wszyskie</a>";
while($row = $result->fetch_object()) {
    echo " <a href='index.php?idKat={$row->id}'>{$row->nazwa}</a>";
}
echo "</p>";
?>
        <form class="search-form">
            <input type="text" name="fraza" class="search-input">
            <input type="submit" value="Wyszukaj" class="search-button">
        </form>
        <a href="insertForm.php" class="add-new-link">Dodaj nowe piwo</a>
        <?php
        $sql = "SELECT * FROM piwo";
        if (isset($_GET["idKat"])) {
            $idKat = $_GET["idKat"];
            $sql .= " WHERE idKategorii = $idKat";
        } elseif (isset($_GET["fraza"])) {
            $fraza = $_GET["fraza"];
            $sql .= " WHERE nazwa LIKE '%$fraza%'";
        }
        $result = $conn->query($sql);

        echo "<div class='table-container'>";
        echo "<table>";
        while ($row = $result->fetch_object()) {
            echo "<tr>";
            echo "<td><img src='obrazki/{$row->obrazek}' alt='{$row->nazwa}' width='150'></td>";
            echo "<td><a href='details.php?id={$row->id}'>{$row->nazwa}</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";

        $conn->close();
        ?>
    </section>
</body>
</html>
