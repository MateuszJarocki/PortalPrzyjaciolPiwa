<?php

require("menu.php");

$id = $_GET['id'];


$sql = "SELECT u.login, u.idPoziomu, p.rola 
        FROM uzytkownicy u 
        JOIN poziom p ON u.idPoziomu = p.id 
        WHERE u.id = ?";


$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Użytkownik nie znaleziony.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dane Uzytkownika</title>
    <link rel="stylesheet" href="piwo.css">
</head>
<body>
    <section>
    <h1>Szczegóły użytkownika</h1>
    <p>Nick: <?= htmlspecialchars($user['login']) ?></p>
    <p>ID Poziomu: <?= htmlspecialchars($user['idPoziomu']) ?></p>
    <p>Rola: <?= htmlspecialchars($user['rola']) ?></p>
</section>
</body>
</html>

<?php

$conn->close();
?>
