<?php
require("menu.php");
$id = $_GET['id'];
$sql = "SELECT p.*, u.login AS autor_login, poziom.rola AS autor_rola 
        FROM piwo p 
        JOIN uzytkownicy u ON p.login = u.login 
        JOIN poziom ON u.idPoziomu = poziom.id
        WHERE p.id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Details</title>
    <link rel="stylesheet" href="piwo.css">
</head>
<body>
    <section>
    <p><?= $row['nazwa'] ?></p>
    <p><?= $row['opis'] ?></p>
    <p>Autor: <?= htmlspecialchars($row['autor_login']) ?> (<?= htmlspecialchars($row['autor_rola']) ?>)</p>
    <p>Pojemność: <?= $row['pojemnosc'] ?> </p>
    <img src="obrazki/<?= $row['obrazek'] ?>" alt="<?= $row['nazwa'] ?>" width='100'>
    <br>

    <?php
        $idUzytkownika = $_SESSION["id"];
        $sql = "SELECT id FROM ulubione WHERE idPiwa = $id AND idUzytkownika = $idUzytkownika";
        $added = $conn->query($sql)->num_rows > 0;
        $src = $added ? "heart_filled.png" : "heart_empty.jpg";
        echo "<img src='$src' class='fav' data-piwo='$id'  alt='ulubiony' width='50'/>";
    ?>

    
    <h2>Dodaj recenzję</h2>
    <form action="insertReview.php" method="post">
        <input type="hidden" name="idPiwa" value="<?= $id ?>">
        <br>
        <p>Ocena</p>
        <input type="number" name="ocena" min="1" max="5" placeholder="1-5" required>
        <br>
        <br>
        <p>Tresc</p>
        <textarea name="tresc" placeholder="Treść recenzji" required></textarea>
        <br>
        <input type="submit" value="Dodaj recenzję">
        <br>
    </form>

    <h2>Recenzje</h2>
    <?php
    $sql_reviews = "SELECT r.*, u.login AS autor_login, poziom.rola AS autor_rola 
                    FROM recenzje r 
                    JOIN uzytkownicy u ON r.nick = u.login 
                    JOIN poziom ON u.idPoziomu = poziom.id 
                    WHERE r.idPiwa = $id";
    $result_reviews = $conn->query($sql_reviews);
    echo "****************************************";
    while($review = $result_reviews->fetch_assoc()) {
        echo" <div class='table-container'>";
        echo "<table>";
        echo "<tr>";
        $nick = htmlspecialchars($review['autor_login']);
        $ocena = htmlspecialchars($review['ocena']);
        $tresc = htmlspecialchars($review['tresc']);
        $data = htmlspecialchars($review['data']);
        $rola = htmlspecialchars($review['autor_rola']);
        echo "<td>";
        echo "<div class='review'>";
        echo "<p>$nick ($rola)</p>";
        echo "<p>Ocena: $ocena</p>";
        echo "<p>$tresc</p>";
        echo "<p>$data</p>";
        echo "</div>";
        echo "****************************************";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        echo "</div>";
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</section>
</body>
</html>
