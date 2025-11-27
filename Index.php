<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>RetroZone</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body>

<?php include 'header.php'; ?>

<h2 style="text-align:center;margin-top:40px;font-family:'Press Start 2P';">Sélection du moment</h2>

<div class="catalogue-container">

<?php
$stmt = $pdo->query("SELECT * FROM games LIMIT 3");
foreach ($stmt as $game):
?>
    <div class="game-card">
        <img src="assets/<?= $game['image'] ?>" width="200">
        <p><?= $game['title'] ?></p>
        <a href="jeu.php?id=<?= $game['id'] ?>" class="btn-view">Voir plus</a>
    </div>
<?php endforeach; ?>

</div>

<?php include 'footer.php'; ?>
</body>
</html>
