<?php
$conn = new mysqli("localhost", "root", "", "conecta_festas");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$sql = "SELECT id, nome, email, tipo FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Usuários Cadastrados</title>
  <style>
    table {
      border-collapse: collapse;
      width: 80%;
      margin: 20px auto;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #f4f4f4;
    }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Usuários Cadastrados</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Tipo</th>
      <th>Ações</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['nome'] ?></td>
      <td><?= $row['email'] ?></td>
      <td><?= $row['tipo'] ?></td>
      <td>
        <a href="editar_usuario.php?id=<?= $row['id'] ?>">Editar</a> |
        <a href="excluir_usuario.php?id=<?= $row['id'] ?>" onclick="return confirm('Deseja realmente excluir este usuário?')">Excluir</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
