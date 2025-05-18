<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Empresa - Conecta Festas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body { background-color: #f8f9fa; }
    .sidebar { height: 100vh; background-color: #212529; color: #fff; }
    .sidebar a { color: #fff; text-decoration: none; display: block; padding: 10px 15px; }
    .sidebar a:hover { background-color: #343a40; }
    .content { padding: 20px; }
  </style>
</head>
<body>
  <div class="d-flex">
    <div class="sidebar p-3">
      <h4>Conecta Festas</h4>
      <hr>
    <a href="index.html"><i class="fas fa-chart-line"></i> Visão Geral</a>
    <a href="eventos.html"><i class="fas fa-calendar-check"></i> Eventos Agendados</a>
    <a href="clientes.html"><i class="fas fa-users"></i> Clientes</a>
    <a href="configuracoes.html"><i class="fas fa-cogs"></i> Configurações</>
    <a href="sair.html"><i class="fas fa-sign-out-alt"></i> Sair</a>

    </div>
    <div class="content flex-fill">
      <h2>Bem-vindo, Empresa!</h2>
      <p>Essa é sua área administrativa para gerenciar os eventos e clientes.</p>
      <div class="row">
        <div class="col-md-4">
          <div class="card text-white bg-primary mb-3">
            <div class="card-body">
              <h5 class="card-title">Eventos Totais</h5>
              <p class="card-text">12</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-white bg-success mb-3">
            <div class="card-body">
              <h5 class="card-title">Clientes Ativos</h5>
              <p class="card-text">8</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
