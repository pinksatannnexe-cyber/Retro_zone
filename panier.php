<?php session_start(); include 'config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $_SESSION['panier'][] = $_GET['id'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
</head>
<body>

<?php include 'header.php'; ?>

<h2 style="text-align:center;">Mon panier</h2>

<?php
if (empty($_SESSION['panier'])) {
    echo "<p style='text-align:center;'>Votre panier est vide.</p>";
} else {
    echo "<ul>";
    foreach ($_SESSION['panier'] as $id) {
        $stmt = $pdo->prepare("SELECT * FROM games WHERE id=?");
        $stmt->execute([$id]);
        $g = $stmt->fetch();
        echo "<li>{$g['title']} - {$g['price']} FCFA</li>";
    }
    echo "</ul>";
}
?>

<?php include 'footer.php'; ?>

</body>
</html>
