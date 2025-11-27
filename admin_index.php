<?php
include '../config.php';
$games = $pdo->query("SELECT * FROM games");
?>
<h2>Gestion des jeux</h2>
<a href="add.php">Ajouter un jeu</a>
<table border="1">
<tr>
<th>ID</th><th>Titre</th><th>Console</th><th>Prix</th><th>Actions</th>
</tr>

<?php foreach ($games as $g): ?>
<tr>
<td><?= $g['id'] ?></td>
<td><?= $g['title'] ?></td>
<td><?= $g['console'] ?></td>
<td><?= $g['price'] ?></td>
<td>
<a href="edit.php?id=<?= $g['id'] ?>">Modifier</a> |
<a href="delete.php?id=<?= $g['id'] ?>">Supprimer</a>
</td>
</tr>
<?php endforeach; ?>

</table>
