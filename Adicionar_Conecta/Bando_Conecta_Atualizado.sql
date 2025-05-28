CREATE DATABASE conecta_festas;
USE conecta_festas;

CREATE TABLE Cliente (
  idCliente INT AUTO_INCREMENT PRIMARY KEY,
  email_cliente VARCHAR(100) ,
  senha_cliente VARCHAR(25),
  nome_cliente VARCHAR(100),
  end_cliente VARCHAR(200),
  tel_cliente INT,
  cpf_cliente INT,
  data_nasc DATE
);

CREATE TABLE Empresa_Parceira (
  idEmpresa INT AUTO_INCREMENT PRIMARY KEY,
  email_emp VARCHAR(100),
  senha_emp VARCHAR(25),
  inss INT,
  nome_emp VARCHAR(100),
  tel_emp INT,
  end_emp VARCHAR(200)
);

CREATE TABLE Produto (
  idProduto INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50),
  tipo VARCHAR(50),
  quantidade INT
);


CREATE TABLE Evento (
  idEvento INT AUTO_INCREMENT PRIMARY KEY,
  nome_event VARCHAR(100),
  data_event DATETIME,
  status_event VARCHAR(15),
  descri_event VARCHAR(500),
  FKidCliente VARCHAR(100),
  FOREIGN KEY (FKidCliente) REFERENCES Cliente(Cliente)
);

CREATE TABLE Orcamento (
  idOrcamento INT AUTO_INCREMENT PRIMARY KEY,
  data_orca DATETIME,
  status_orca VARCHAR(25),
  nome_orca VARCHAR(100),
  FKidEvento INT,
  FOREIGN KEY (FKidEvento) REFERENCES Evento(idEvento)
);

CREATE TABLE ItensPedido (
  FKidOrcamento INT,
  FK_idProduto INT,
  quantidade INT,
  PRIMARY KEY (FKidOrcamento, FK_idProduto),
  FOREIGN KEY (FKidOrcamento) REFERENCES Orcamento(idOrcamento),
  FOREIGN KEY (FK_idProduto) REFERENCES Produto(idProduto)
);

CREATE TABLE ProdutoEmpresa (
  FKidProduto INT,
  FKidEmpresa INT,
  valorunitario INT,
  PRIMARY KEY (FKidProduto, FKidEmpresa),
  FOREIGN KEY (FKidProduto) REFERENCES Produto(idProduto),
  FOREIGN KEY (FKidEmpresa) REFERENCES Empresa_Parceira(idEmpresa)
);
