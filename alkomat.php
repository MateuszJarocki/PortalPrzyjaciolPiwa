<?php
 require("menu.php");
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
    <section>
        <p>Sprawdź, ile ml czystego alkoholu, będzie zawierać piwo, które zamierzasz wypić!</p>

        <label for="bottle">Wpisz ilosc butelek:</label>
        <input type="number" id="bottle"><br><br>
        <label for="volume">Wpisz objetosc butelki (ml):</label>
        <input type="number" id="volume"><br><br>
        <label for="alko">Wpisz procentaż alkoholu, w twoim piwie (%) </label>
        <input type="number" id="alko">

        <button id="accept">Zatwierdź</button>
        <p id="result"></p>
      
        <p id="komunikat"></p>
        <script src="converter.js"></script>
    </section>
</body>
</html>