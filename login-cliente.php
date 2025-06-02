<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "conecta_festas");

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro de conexão com o banco."]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$senha = $data['senha'];

$stmt = $conn->prepare("SELECT * FROM clientes WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($cliente = $result->fetch_assoc()) {
    if (password_verify($senha, $cliente['senha'])) {
        echo json_encode(["sucesso" => true, "cliente" => ["email" => $cliente["email"]]]);
    } else {
        http_response_code(401);
        echo json_encode(["erro" => "Senha incorreta."]);
    }
} else {
    http_response_code(404);
    echo json_encode(["erro" => "Usuário não encontrado."]);
}

$stmt->close();
$conn->close();
?>
