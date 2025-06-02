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
$senha = password_hash($data['senha'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO clientes (email, senha) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $senha);

if ($stmt->execute()) {
    echo json_encode(["sucesso" => true]);
} else {
    http_response_code(400);
    echo json_encode(["erro" => "Email já cadastrado."]);
}

$stmt->close();
$conn->close();
?>
