<?php
require 'conexao.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM contatos WHERE id = :id");
$stmt->execute([':id' => $id]);
$contato = $stmt->fetch();

if (!$contato) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Editar Contato</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Editar Contato</h1>

<form action="salvar.php" method="post">
    <input type="hidden" name="id" value="<?= $contato['id'] ?>">
    <input type="text" name="nome" value="<?= htmlspecialchars($contato['nome']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($contato['email']) ?>" required>
    <input type="text" name="telefone" value="<?= htmlspecialchars($contato['telefone']) ?>" required>
    <button type="submit">Salvar</button>
    <a href="index.php" class="cancelar">Cancelar</a>
</form>

</div>

</body>
</html>
