<?php
 require("session.php");
 require("db.php");
 $login = $_SESSION['login'];
 $sql = "SELECT id FROM uzytkownicy WHERE login = ?";
 $stmt = $conn->prepare($sql);
 $stmt->bind_param("s", $login);
 $stmt->execute();
 $result = $stmt->get_result();
 $user = $result->fetch_assoc();
 $userId = $user['id'];


 $stmt->close();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="piwo.css">
</head>
<body>

<nav>
<a href="index.php"><img src="piwoes.png" alt="logo" width='60'></a>
    <text class="hello"> Witaj <?= $_SESSION["login"] ?>! </text>
    <a href="index.php" class="option1">Strona główna</a>
    <a href="favourites.php" class="option">Ulubione</a>
    <a href="myReviews.php" class="option">Moje recenzje</a>
    <a href="alkomat.php" class="option">Alkomat</a>
    <a href="poradnik.php" class="option">Poradnik</a>
    <a href="zasady.php" class="option">Zasady</a>
    <a href="userDetails.php?id=<?= $userId ?>" class="option">Mój profil</a>
    <a href="logout.php" class="option">Wyloguj</a>
</nav>

</body>
</html>
