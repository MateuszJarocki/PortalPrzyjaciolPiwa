<?php
require("db.php");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="piwo.css">
</head>
<body>

<?php
if (isset($_POST["login"])) {
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    $email = $_POST["email"];

    $check_sql = "SELECT * FROM uzytkownicy WHERE login = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      
        echo "<div class='form'>
                <h3>Użytkownik o takim loginie już istnieje.</h3><br/>
                <p class='link'>Kliknij tutaj, aby ponowić próbę <a href='registration.php'>rejestracji</a>.</p>
              </div>";
    } else {
        $sql = "INSERT INTO uzytkownicy (login, haslo, email, idPoziomu) VALUES (?, ?, ?, 1)";
        $stmt = $conn->prepare($sql);
        $hashed_password = md5($haslo);
        $stmt->bind_param("sss", $login, $hashed_password, $email);
        $result = $stmt->execute();

        if ($result) {
            echo "<div class='form'>
                    <h3>Zostałeś pomyślnie zarejestrowany.</h3><br/>
                    <p class='link'>Kliknij tutaj, aby się <a href='login.php'>zalogować</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                    <h3>Nie wypełniłeś wymaganych pól.</h3><br/>
                    <p class='link'>Kliknij tutaj, aby ponowić próbę <a href='registration.php'>rejestracji</a>.</p>
                  </div>";
        }
    }
} else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Rejestracja</h1>
        <input type="text" class="login-input" name="login" placeholder="Login" required>
        <input type="password" class="login-input" name="haslo" placeholder="Hasło" required>
        <input type="text" class="login-input" name="email" placeholder="Adres email" required>
        <input type="submit" name="submit" value="Zarejestruj się" class="login-button">
        <p class="link"><a href="login.php">Zaloguj się</a></p>
    </form>
<?php
}
?>


</body>
</html>
