/*
INSERT INTO clientes (
    id_loja,  codigo, nome_completo, tipo_pessoa, documento, tipo_cliente, email, telefone, cep, endereco, endereco_numero, complemento, bairro, cidade, estado, obs,  status, dt_reg, dt_alt) 
    VALUES
(1, '3Q0GAJ-VZL0H2', 'João Silva', 'PF', '123.456.789-09', 'COMPRADOR', 'joao.silva@acme.com', '11987654321', '', '','', '', '', '', '','', '1', NOW(), NOW()),

(1, 'VZL0H3-3Q0GAJ', 'Maria Oliveira', 'PF', '987.654.321-00', 'PROPRIETARIO', 'maria.oliveira@acme.com', '21987654321', '','', '', '', '','', '', '', '1', NOW(), NOW()),

(1, '4Q0JAJ-YLZ0H4', 'Carlos Souza', 'PF', '456.789.123-01', 'LOCADOR', 'carlos.souza@acme.com', '31987654321', '', '', '', '', '', '','', '', '1', NOW(), NOW()),

(1, '1R0GAJ-TZL0K5', 'Ana Santos', 'PF', '789.123.456-02', 'PROPRIETARIO', 'ana.santos@acme.com', '41987654321', '', '', '', '', '', '','', '', '1', NOW(), NOW()),

(1, '2WGAJ-VZL0H6', 'Pedro Lima', 'PF', '321.654.987-03', 'LOCADOR', 'pedro.lima@acme.com', '51987654321', '', '', '', '', '', '', '','', '1', NOW(), NOW());
*/

INSERT INTO clientes (id_loja, codigo, nome_completo, tipo_pessoa, documento, tipo_cliente, email, telefone, cep, endereco, endereco_numero, complemento, bairro, cidade, estado, obs, status, dt_reg, dt_alt) VALUES
(1, 'QW3D5F-3DGH01', 'João Silva', 'PF', '123.456.789-00', 'COMPRADOR', 'joao.silva@example.com', '11987654321', '01234567', 'Rua das Flores', '100', 'Apto 1', 'Jardim', 'São Paulo', 'SP', 'Observação 1', '1', NOW(), NOW()),
(1, 'QW3D5F-3DGH02', 'Maria Oliveira', 'PF', '234.567.890-11', 'VENDEDOR', 'maria.oliveira@example.com', '11987654322', '02345678', 'Av. Paulista', '200', NULL, 'Centro', 'São Paulo', 'SP', 'Observação 2', '1', NOW(), NOW()),
(1, 'QW3D5F-3DGH03', 'Pedro Santos', 'PJ', '12.345.678/0001-90', 'INQUILICO', 'pedro.santos@example.com', '11987654323', '03456789', 'Rua da Liberdade', '300', NULL, 'Liberdade', 'São Paulo', 'SP', 'Observação 3', '1', NOW(), NOW()),
(1, 'QW3D5F-3DGH04', 'Ana Costa', 'PF', '345.678.901-22', 'COMPRADOR', 'ana.costa@example.com', '11987654324', '04567890', 'Rua das Acácias', '400', 'Casa 2', 'Jardim das Acácias', 'São Paulo', 'SP', 'Observação 4', '1', NOW(), NOW()),
(1, 'QW3D5F-3DGH05', 'Carlos Almeida', 'PJ', '23.456.789/0001-01', 'VENDEDOR', 'carlos.almeida@example.com', '11987654325', '05678901', 'Rua dos Jasmins', '500', NULL, 'Vila Nova', 'São Paulo', 'SP', 'Observação 5', '1', NOW(), NOW()),
(1, 'QW3D5F-3DGH06', 'Juliana Lima', 'PF', '456.789.012-33', 'INQUILICO', 'juliana.lima@example.com', '11987654326', '06789012', 'Av. dos Bandeirantes', '600', 'Sala 301', 'Itaim Bibi', 'São Paulo', 'SP', 'Observação 6', '1', NOW(), NOW()),
(1, 'QW3D5F-3DGH07', 'Roberto Pereira', 'PJ', '34.567.890/0001-12', 'COMPRADOR', 'roberto.pereira@example.com', '11987654327', '07890123', 'Rua dos Girassóis', '700', NULL, 'Vila Mariana', 'São Paulo', 'SP', 'Observação 7', '1', NOW(), NOW()),
(1, 'QW3D5F-3DGH08', 'Mariana Souza', 'PF', '567.890.123-44', 'VENDEDOR', 'mariana.souza@example.com', '11987654328', '08901234', 'Rua das Palmeiras', '800', 'Casa 5', 'Campo Belo', 'São Paulo', 'SP', 'Observação 8', '1', NOW(), NOW()),
(1, 'QW3D5F-3DGH09', 'Felipe Oliveira', 'PJ', '45.678.901/0001-23', 'INQUILICO', 'felipe.oliveira@example.com', '11987654329', '09012345', 'Av. Ibirapuera', '900', NULL, 'Itaquera', 'São Paulo', 'SP', 'Observação 9', '1', NOW(), NOW()),
(1, 'QW3D5F-3DGH10', 'Sofia Martins', 'PF', '678.901.234-55', 'COMPRADOR', 'sofia.martins@example.com', '11987654330', '10123456', 'Rua do Pequi', '1000', NULL, 'Vila Sônia', 'São Paulo', 'SP', 'Observação 10', '1', NOW(), NOW());


SELECT * FROM CLIENTES;
