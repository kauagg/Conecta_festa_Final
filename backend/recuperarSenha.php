<?php
session_start();
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'recoverEmail', FILTER_VALIDATE_EMAIL);

    if (!$email) {
        $_SESSION['error'] = 'Email inválido';
        header('Location: ../index.html');
        exit();
    }

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);

    if ($stmt->rowCount()) {
        // Aqui você pode gerar token e enviar por e-mail (simulação)
        $_SESSION['success'] = 'Link de recuperação enviado para o e-mail informado.';
    } else {
        $_SESSION['error'] = 'Email não encontrado';
    }

    header('Location: ../index.html');
    exit();
}
