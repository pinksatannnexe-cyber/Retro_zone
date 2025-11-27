<?php
include 'config.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM games WHERE id = ?");
$stmt->execute([$id]);
$game = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $game['title'] ?></title>
</head>
<body>

<?php include 'header.php'; ?>

<div style="width:80%;margin:auto;margin-top:40px;">
    <img src="assets/<?= $game['image'] ?>" width="300">
    <h2><?= $game['title'] ?></h2>
    <p><b>Console :</b> <?= $game['console'] ?></p>
    <p><b>Année :</b> <?= $game['year'] ?></p>
    <p><b>Genre :</b> <?= $game['genre'] ?></p>
    <p><b>Prix :</b> <?= $game['price'] ?> FCFA</p>
    <p><?= $game['description'] ?></p>
    <a href="panier.php?id=<?= $game['id'] ?>">Ajouter au panier</a>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
