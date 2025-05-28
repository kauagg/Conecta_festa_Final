<?php
$conn = new mysqli("localhost", "root", "", "conecta_festas");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_GET['id'];

// Atualiza evento
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_cliente = $_POST['email_cliente'];
    $data_evento = $_POST['data_evento'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    $sql = "UPDATE eventos SET 
              email_cliente='$email_cliente', 
              data_evento='$data_evento', 
              descricao='$descricao',
              status='$status' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Evento atualizado com sucesso!'); window.location.href='eventos.php';</script>";
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}

// Busca dados atuais
$sql = "SELECT * FROM eventos WHERE id = $id";
$result = $conn->query($sql);
$evento = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Evento</title>
  <style>
    form {
      width: 400px;
      margin: 50px auto;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    input, textarea, select {
      padding: 8px;
      font-size: 14px;
    }
    button {
      background: #FF9800;
      color: white;
      padding: 10px;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Editar Evento</h2>
  <form method="POST">
    <input type="email" name="email_cliente" value="<?= $evento['email_cliente'] ?>" required>
    <input type="date" name="data_evento" value="<?= $evento['data_evento'] ?>" required>
    <textarea name="descricao" required><?= $evento['descricao'] ?></textarea>
    <select name="status" required>
      <option value="Pendente" <?= $evento['status'] == 'Pendente' ? 'selected' : '' ?>>Pendente</option>
      <option value="Confirmado" <?= $evento['status'] == 'Confirmado' ? 'selected' : '' ?>>Confirmado</option>
      <option value="Cancelado" <?= $evento['status'] == 'Cancelado' ? 'selected' : '' ?>>Cancelado</option>
    </select>
    <button type="submit">Salvar Alterações</button>
  </form>
</body>
</html>
e