INSERT INTO clientes (
    id_loja,  codigo, nome_completo, tipo_pessoa, documento, tipo_cliente, email, telefone, cep, endereco, endereco_numero, complemento, bairro, cidade, estado, obs,  status, dt_reg, dt_alt) 
    VALUES
(1, '3Q0GAJ-VZL0H2', 'João Silva', 'PF', '123.456.789-09', 'COMPRADOR', 'joao.silva@acme.com', '11987654321', '', '','', '', '', '', '','', '1', NOW(), NOW()),

(1, 'VZL0H3-3Q0GAJ', 'Maria Oliveira', 'PF', '987.654.321-00', 'PROPRIETARIO', 'maria.oliveira@acme.com', '21987654321', '','', '', '', '','', '', '', '1', NOW(), NOW()),

(1, '4Q0JAJ-YLZ0H4', 'Carlos Souza', 'PF', '456.789.123-01', 'LOCADOR', 'carlos.souza@acme.com', '31987654321', '', '', '', '', '', '','', '', '1', NOW(), NOW()),

(1, '1R0GAJ-TZL0K5', 'Ana Santos', 'PF', '789.123.456-02', 'PROPRIETARIO', 'ana.santos@acme.com', '41987654321', '', '', '', '', '', '','', '', '1', NOW(), NOW()),

(1, '2WGAJ-VZL0H6', 'Pedro Lima', 'PF', '321.654.987-03', 'LOCADOR', 'pedro.lima@acme.com', '51987654321', '', '', '', '', '', '', '','', '1', NOW(), NOW());

SELECT * FROM CLIENTES;
