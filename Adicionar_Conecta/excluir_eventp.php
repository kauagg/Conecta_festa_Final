<?php
$conn = new mysqli("localhost", "root", "", "conecta_festas");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM eventos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Evento excluído com sucesso!'); window.location.href='eventos.php';</script>";
} else {
    echo "Erro ao excluir: " . $conn->error;
}
?>
