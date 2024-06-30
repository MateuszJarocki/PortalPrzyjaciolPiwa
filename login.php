<?php
require('db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="piwo.css">
</head>
<body>

<?php
if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    
    $sql = "SELECT * FROM uzytkownicy WHERE login = ? AND haslo = ?";
    $stmt = $conn->prepare($sql);
    $hashed_password = md5($haslo);
    $stmt->bind_param("ss", $login, $hashed_password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $_SESSION["login"] = $login;
        $_SESSION["id"] = $result->fetch_object()->id;
        header("Location: index.php");
    } else {
        echo "<div class='form'>
                <h3>Nieprawidłowy login lub hasło.</h3><br/>
                <p class='link'>Ponów próbę <a href='login.php'>logowania</a>.</p>
              </div>";
    }
} else {
?>

    <form class="form" method="post" name="login">
        <h1 class="login-title">Logowanie</h1>
        <input type="text" class="login-input" name="login" placeholder="Login" autofocus="true" required>
        <input type="password" class="login-input" name="haslo" placeholder="Hasło" required>
        <input type="submit" value="Zaloguj" name="submit" class="login-button">
        <p class="link"><a href="registration.php">Zarejestruj się</a></p>
    </form>

<?php
}
?>

</body>
</html>
