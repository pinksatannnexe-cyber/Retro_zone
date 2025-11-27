<?php
include '../config.php';
$id = $_GET['id'];
$pdo->prepare("DELETE FROM games WHERE id=?")->execute([$id]);
header("Location: index.php");
?>
