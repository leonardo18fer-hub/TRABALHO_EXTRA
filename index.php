<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT * FROM contatos ORDER BY criado_em DESC");
$contatos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Agenda de Contatos</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Agenda de Contatos</h1>

<form action="salvar.php" method="post" id="formContato">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="text" name="telefone" placeholder="Telefone" required>
    <button type="submit">Cadastrar</button>
</form>

<table>
<thead>
<tr>
    <th>Nome</th>
    <th>E-mail</th>
    <th>Telefone</th>
    <th>Ações</th>
</tr>
</thead>
<tbody>
<?php if (count($contatos) == 0): ?>
<tr><td colspan="4">Nenhum contato cadastrado.</td></tr>
<?php else: ?>
<?php foreach ($contatos as $c): ?>
<tr>
    <td><?= htmlspecialchars($c['nome']) ?></td>
    <td><?= htmlspecialchars($c['email']) ?></td>
    <td><?= htmlspecialchars($c['telefone']) ?></td>
    <td class="action-btns">
        <a href="editar.php?id=<?= $c['id'] ?>">Editar</a>
        <a href="excluir.php?id=<?= $c['id'] ?>" onclick="return confirmarExcluir()">Excluir</a>
    </td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
</tbody>
</table>

</div>

<script src="script.js"></script>
</body>
</html>
