<?php
require 'conexao.php';

$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$telefone = trim($_POST['telefone']);
$id = $_POST['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("UPDATE contatos SET nome=:nome, email=:email, telefone=:telefone WHERE id=:id");
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone,
        ':id' => $id
    ]);
} else {
    $stmt = $pdo->prepare("INSERT INTO contatos (nome,email,telefone) VALUES (:nome,:email,:telefone)");
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone
    ]);
}

header("Location: index.php");
exit;
