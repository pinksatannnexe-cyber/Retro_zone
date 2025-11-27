<?php
include '../config.php';

if ($_POST) {
    $stmt = $pdo->prepare("INSERT INTO games (title, console, year, genre, price, stock, image, description)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['title'], $_POST['console'], $_POST['year'],
        $_POST['genre'], $_POST['price'], $_POST['stock'],
        $_POST['image'], $_POST['description']
    ]);
    header("Location: index.php");
}
?>

<form method="POST">
<input name="title" placeholder="Titre"><br>
<input name="console" placeholder="Console"><br>
<input name="year" placeholder="Année"><br>
<input name="genre" placeholder="Genre"><br>
<input name="price" placeholder="Prix"><br>
<input name="stock" placeholder="Stock"><br>
<input name="image" placeholder="Image (ex: mario.jpg)"><br>
<textarea name="description"></textarea><br>
<button>Ajouter</button>
</form>
