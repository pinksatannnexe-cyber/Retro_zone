<?php
// Connexion à la BD
try {
    $pdo = new PDO("mysql:host=localhost;dbname=retrozone;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}

// Récupérer tous les jeux
$stmt = $pdo->query("SELECT * FROM games ORDER BY title ASC");
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue | RetroZone</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

        body {
            margin: 0;
            padding: 0;
            background: #0d0d0d;
            color: #e0e0e0;
            font-family: 'Press Start 2P', cursive;
        }

        header {
            text-align: center;
            padding: 30px;
            background: linear-gradient(90deg, #8a2be2, #ff00ff, #00ffff);
            color: black;
            text-shadow: 0 0 5px white;
        }

        h1 {
            margin: 0;
        }

        .catalogue-container {
            width: 90%;
            margin: 40px auto;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .game-card {
            width: 230px;
            background: #111;
            border: 2px solid #8a2be2;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0px 0px 10px #8a2be2;
        }

        .game-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 0px 15px #ff00ff;
        }

        .game-card img {
            width: 100%;
            border-radius: 5px;
        }

        .game-title {
            font-size: 12px;
            margin-top: 10px;
            line-height: 18px;
        }

        .game-console {
            font-size: 10px;
            opacity: 0.7;
        }

        .price {
            margin-top: 10px;
            font-size: 12px;
            color: #00ffff;
        }

        .btn-view {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 10px;
            font-size: 10px;
            color: white;
            text-decoration: none;
            border: 2px solid #ff00ff;
            border-radius: 6px;
            transition: 0.3s;
        }

        .btn-view:hover {
            background: #ff00ff;
            box-shadow: 0px 0px 10px #ff00ff;
        }

        footer {
            margin-top: 60px;
            text-align: center;
            font-size: 10px;
            opacity: 0.6;
            padding-bottom: 30px;
        }
    </style>
</head>

<body>

<header>
    <h1>CATALOGUE</h1>
</header>

<div class="catalogue-container">

    <?php foreach ($games as $game): ?>
        <div class="game-card">
            <img src="assets/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['title']) ?>">

            <p class="game-title"><?= htmlspecialchars($game['title']) ?></p>
            <p class="game-console"><?= htmlspecialchars($game['console']) ?> • <?= htmlspecialchars($game['year']) ?></p>
            <p class="price"><?= number_format($game['price'], 2, ',', ' ') ?> FCFA</p>

            <a href="jeu.php?id=<?= $game['id'] ?>" class="btn-view">Voir plus</a>
        </div>
    <?php endforeach; ?>

</div>

<footer>
    RetroZone © 2025 - Catalogue
</footer>

</body>
</html>
<?php
include 'config.php';
$games = $pdo->query("SELECT * FROM games ORDER BY title ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
</head>
<body>

<?php include 'header.php'; ?>

<div class="catalogue-container">

<?php foreach ($games as $g): ?>
    <div class="game-card">
        <img src="assets/<?= $g['image'] ?>" width="200">
        <p><?= $g['title'] ?></p>
        <small><?= $g['console'] ?> - <?= $g['year'] ?></small>
        <p><?= $g['price'] ?> FCFA</p>
        <a href="jeu.php?id=<?= $g['id'] ?>" class="btn-view">Voir plus</a>
    </div>
<?php endforeach; ?>

</div>

<?php include 'footer.php'; ?>
</body>
</html>
