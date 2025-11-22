<?php
require 'conexao.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM contatos WHERE id = :id");
$stmt->execute([':id' => $id]);

header("Location: index.php");
exit;
