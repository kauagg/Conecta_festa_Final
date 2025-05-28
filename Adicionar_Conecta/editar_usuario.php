<?php
$conn = new mysqli("localhost", "root", "", "conecta_festas");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email', tipo='$tipo' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href='consultar_usuarios.php';</script>";
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}

$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuário</title>
  <style>
    form {
      width: 300px;
      margin: 50px auto;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    input, select {
      padding: 8px;
      font-size: 14px;
    }
    button {
      background: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
    }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Editar Usuário</h2>
  <form method="POST">
    <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
    <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
    <select name="tipo" required>
      <option value="admin" <?= $usuario['tipo'] == 'admin' ? 'selected' : '' ?>>Admin</option>
      <option value="cliente" <?= $usuario['tipo'] == 'cliente' ? 'selected' : '' ?>>Cliente</option>
    </select>
    <button type="submit">Salvar Alterações</button>
  </form>
</body>
</html>
