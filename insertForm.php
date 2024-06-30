<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj Nowe Piwo</title>
    <link rel="stylesheet" href="piwo.css">
</head>
<body>
    <section>
    <h1>Dodaj Nowe Piwo</h1>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <p>
            Nazwa: <input type="text" name="nazwa">
        </p>
        <p>
            Opis: <textarea name="opis"></textarea>
        </p>
        <p>
            Pojemność: <input type="text" name="pojemnosc">
        </p>
        <p>
            Obrazek: <input type="file" name="obrazek">
        </p>
        <p>
            Kategoria: <select name="idKategorii">
                <?php
                $conn = new mysqli("localhost", "root", "", "portal");
                

                $sql = "SELECT id, nazwa FROM kategorie ORDER BY nazwa";
                $result = $conn->query($sql);

                while ($row = $result->fetch_object()) {
                    echo "<option value='{$row->id}'>{$row->nazwa}</option>";
                }

                $conn->close();
                ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Dodaj piwo">
        </p>
    </form>
    <p><a href="index.php">Powrót na strone główną</a></p>
  </section>
</body>
</html>
