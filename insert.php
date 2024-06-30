<?php
require('session.php');
require('db.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nazwa = $_POST['nazwa'];
    $opis = $_POST['opis'];
    $nick = $_SESSION['login'];
    $pojemnosc = $_POST['pojemnosc'];
    $idKategorii = $_POST['idKategorii'];
    $obrazek = basename($_FILES["obrazek"]["name"]);

    move_uploaded_file($_FILES["obrazek"]["tmp_name"], "obrazki/$obrazek");
    
    $sql = "INSERT INTO piwo (nazwa, opis, login, pojemnosc, obrazek, idKategorii) 
        VALUES ('$nazwa', '$opis','$nick', '$pojemnosc','$obrazek', '$idKategorii')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
