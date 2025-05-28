<?php
$conn = new mysqli("localhost", "root", "", "conecta_festas");
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
$sql = "SELECT * FROM eventos ORDER BY data_evento ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Eventos Agendados</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f2f5;
      margin: 0;
      padding: 20px;
    }
    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }
    table {
      width: 100%;
      max-width: 900px;
      margin: 0 auto 50px;
      border-collapse: separate;
      border-spacing: 0 10px;
      box-shadow: 0 4px 15px rgb(0 0 0 / 0.1);
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
    }
    thead tr {
      background: #2196F3;
      color: white;
      text-transform: uppercase;
      font-size: 14px;
    }
    th, td {
      padding: 15px 20px;
      text-align: center;
    }
    tbody tr {
      background: white;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
      border-radius: 8px;
      box-shadow: 0 1px 3px rgb(0 0 0 / 0.1);
    }
    tbody tr:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 20px rgb(33 150 243 / 0.3);
    }
    .acoes a {
      margin: 0 8px;
      color: #2196F3;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.2s ease;
    }
    .acoes a:hover {
      color: #0b63c9;
    }
    @media (max-width: 700px) {
      table, thead, tbody, th, td, tr {
        display: block;
      }
      thead tr {
        display: none;
      }
      tbody tr {
        margin-bottom: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        border-radius: 12px;
        padding: 15px;
      }
      tbody td {
        text-align: right;
        padding-left: 50%;
        position: relative;
        font-size: 14px;
      }
      tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        width: 45%;
        padding-left: 10px;
        font-weight: 700;
        text-align: left;
        color: #555;
      }
      .acoes {
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <h2>Eventos Agendados</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>E-mail do Cliente</th>
        <th>Data do Evento</th>
        <th>Descrição</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($evento = $result->fetch_assoc()): ?>
      <tr>
        <td data-label="ID"><?= $evento['id'] ?></td>
        <td data-label="E-mail do Cliente"><?= htmlspecialchars($evento['email_cliente']) ?></td>
        <td data-label="Data do Evento"><?= date('d/m/Y', strtotime($evento['data_evento'])) ?></td>
        <td data-label="Descrição"><?= htmlspecialchars($evento['descricao']) ?></td>
        <td data-label="Status"><?= htmlspecialchars($evento['status']) ?></td>
        <td class="acoes" data-label="Ações">
          <a href="editar_evento.php?id=<?= $evento['id'] ?>">Editar</a>
          <a href="excluir_evento.php?id=<?= $evento['id'] ?>" onclick="return confirm('Deseja excluir este evento?')">Excluir</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>
