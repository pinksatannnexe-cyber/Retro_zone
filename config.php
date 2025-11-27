<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=retrozone;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>
