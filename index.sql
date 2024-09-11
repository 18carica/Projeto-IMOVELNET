-- Cria o banco de dados
CREATE DATABASE imobiliaria;

-- Seleciona o banco de dados
USE imobiliaria;

-- Cria a tabela de imóveis
CREATE TABLE imoveis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    tipo ENUM('casa', 'apartamento') NOT NULL,
    imagens TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Cria a tabela de clientes
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    endereco VARCHAR(255)
);

-- Cria a tabela de funcionários
CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    cargo VARCHAR(255),
    data_admissao DATE NOT NULL
);

-- Cria a tabela de contratos
CREATE TABLE contratos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_imovel INT NOT NULL,
    id_cliente INT NOT NULL,
    id_funcionario INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE,
    valor DECIMAL(10, 2) NOT NULL,
    tipo ENUM('venda', 'aluguel') NOT NULL,
    data_contrato TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_imovel) REFERENCES imoveis(id),
    FOREIGN KEY (id_cliente) REFERENCES clientes(id),
    FOREIGN KEY (id_funcionario) REFERENCES funcionarios(id)
);

-- Cria a tabela de interações com clientes
CREATE TABLE interacoes_clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_funcionario INT NOT NULL,
    data_interacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    tipo_interacao ENUM('email', 'telefone', 'reuniao') NOT NULL,
    descricao TEXT,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id),
    FOREIGN KEY (id_funcionario) REFERENCES funcionarios(id)
);

-- Tabela de visitas aos imóveis
CREATE TABLE visitas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_imovel INT NOT NULL,
    id_cliente INT NOT NULL,
    id_funcionario INT NOT NULL,
    data_visita TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    observacoes TEXT,
    FOREIGN KEY (id_imovel) REFERENCES imoveis(id),
    FOREIGN KEY (id_cliente) REFERENCES clientes(id),
    FOREIGN KEY (id_funcionario) REFERENCES funcionarios(id)
);

-- Tabela de documentos
CREATE TABLE documentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_imovel INT,
    id_cliente INT,
    id_contrato INT,
    tipo ENUM('contrato', 'documento_imovel', 'documento_cliente') NOT NULL,
    descricao TEXT,
    caminho_arquivo VARCHAR(255) NOT NULL,
    data_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_imovel) REFERENCES imoveis(id),
    FOREIGN KEY (id_cliente) REFERENCES clientes(id),
    FOREIGN KEY (id_contrato) REFERENCES contratos(id)
);

-- Tabela de comissões
CREATE TABLE comissoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_funcionario INT NOT NULL,
    id_contrato INT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data_comissao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_funcionario) REFERENCES funcionarios(id),
    FOREIGN KEY (id_contrato) REFERENCES contratos(id)
);

-- Tabela de despesas e receitas com mais colunas
CREATE TABLE financeiro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo ENUM('despesa', 'receita') NOT NULL,
    descricao TEXT NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data_financeiro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    categoria VARCHAR(255) NOT NULL,
    forma_pagamento ENUM('dinheiro', 'cartao', 'transferencia', 'boleto') NOT NULL,
    status_pagamento ENUM('pago', 'pendente') NOT NULL,
    responsavel VARCHAR(255)
);

-- Tabela de manutenção de imóveis
CREATE TABLE manutencoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_imovel INT NOT NULL,
    descricao TEXT NOT NULL,
    data_manutencao DATE NOT NULL,
    custo DECIMAL(10, 2),
    FOREIGN KEY (id_imovel) REFERENCES imoveis(id)
);

