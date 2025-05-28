<?php
$conn = new mysqli("localhost", "root", "", "conecta_festas");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM usuarios WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Usuário excluído com sucesso!'); window.location.href='consultar_usuarios.php';</script>";
} else {
    echo "Erro ao excluir: " . $conn->error;
}
?>
