<?php
require('session.php');
require('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idPiwa = $_POST['idPiwa'];
    $ocena = $_POST['ocena'];
    $tresc = $_POST['tresc'];
    $nick = $_SESSION['login'];

    
    $sql_user = "SELECT id, idPoziomu, liczbaRecenzji FROM uzytkownicy WHERE login = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("s", $nick);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();
    $user = $result_user->fetch_assoc();
    $idUzytkownika = $user['id'];
    $currentLevel = $user['idPoziomu'];
    $currentReviews = $user['liczbaRecenzji'];

    
    $sql_insert = "INSERT INTO recenzje (idPiwa, ocena, tresc, nick, data) VALUES (?, ?, ?, ?, NOW())";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iiss", $idPiwa, $ocena, $tresc, $nick);
    $stmt_insert->execute();

   
    $newReviews = $currentReviews + 1;
    
    if ($newReviews % 5 == 0) {
        $newLevel = $currentLevel + 1;
    } else {
        $newLevel = $currentLevel;
    }

    
    $sql_update = "UPDATE uzytkownicy SET idPoziomu = ?, liczbaRecenzji = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("iii", $newLevel, $newReviews, $idUzytkownika);
    $stmt_update->execute();

   
    $stmt_user->close();
    $stmt_insert->close();
    $stmt_update->close();
    $conn->close();

    header("Location: details.php?id=$idPiwa");
    exit();
} else {
    echo "Invalid request method.";
}
?>
