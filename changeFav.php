<?php
require("session.php");
require("db.php");

$idPiwa = $_REQUEST["idPiwa"];
$idUzytkownika = $_SESSION["id"];

$sql = "SELECT id FROM ulubione WHERE idPiwa = $idPiwa AND idUzytkownika = $idUzytkownika";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $id = $result->fetch_object()->id;
    $sql = "DELETE FROM ulubione WHERE id = $id";
} else {
    $sql = "INSERT INTO ulubione (idPiwa, idUzytkownika) VALUES ($idPiwa, $idUzytkownika)";
}

if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    echo "sukces";
}

$conn->close();
?>
