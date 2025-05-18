<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Cliente - Conecta Festas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body { background-color: #f8f9fa; }
    .sidebar { height: 100vh; background-color: #343a40; color: #fff; }
    .sidebar a { color: #fff; text-decoration: none; display: block; padding: 10px 15px; }
    .sidebar a:hover { background-color: #495057; }
    .content { padding: 20px; }
  </style>
</head>
<body>
  <div class="d-flex">
    <div class="sidebar p-3">
      <h4>Conecta Festas</h4>
      <hr>
      <a href="#"><i class="fas fa-home"></i> Início</a>
      <a href="#"><i class="fas fa-calendar-alt"></i> Meus Eventos</a>
      <a href="#"><i class="fas fa-user"></i> Perfil</a>
      <a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
    </div>
    <div class="content flex-fill">
      <h2>Bem-vindo, Cliente!</h2>
      <p>Essa é sua área exclusiva para visualizar e gerenciar seus eventos.</p>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Próximo Evento</h5>
          <p class="card-text">Nenhum evento agendado.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
