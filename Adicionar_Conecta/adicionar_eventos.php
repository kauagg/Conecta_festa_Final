<?php
$conn = new mysqli("localhost", "root", "", "conecta_festas");
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_cliente = $_POST['email_cliente'];
    $data_evento = $_POST['data_evento'];
    $descricao = $_POST['descricao'];
    $status = 'Pendente';

    $sql = "INSERT INTO eventos (email_cliente, data_evento, descricao, status) VALUES ('$email_cliente', '$data_evento', '$descricao', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Evento adicionado com sucesso!'); window.location.href='eventos.php';</script>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Adicionar Evento</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f2f5;
      margin: 0; padding: 20px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }
    form {
      background: white;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgb(0 0 0 / 0.1);
      width: 100%;
      max-width: 450px;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    input, textarea {
      padding: 12px 15px;
      font-size: 16px;
      border: 1.8px solid #ccc;
      border-radius: 8px;
      transition: border-color 0.3s ease;
      resize: vertical;
      font-family: inherit;
    }
    input:focus, textarea:focus {
      border-color: #2196F3;
      outline: none;
    }
    button {
      background: #2196F3;
      color: white;
      border: none;
      padding: 14px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      font-weight: 600;
    }
    button:hover {
      background: #1769aa;
    }
    @media (max-width: 480px) {
      body {
        padding: 10px;
      }
      form {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <form method="POST">
    <h2>Adicionar Novo Evento</h2>
    <input type="email" name="email_cliente" placeholder="E-mail do Cliente" required />
    <input type="date" name="data_evento" required />
    <textarea name="descricao" placeholder="Descrição do evento" rows="4" required></textarea>
    <button type="submit">Salvar Evento</button>
  </form>
</body>
</html>
