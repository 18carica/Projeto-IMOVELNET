/*
INSERT INTO fornecedores (id_loja, codigo, fornecedor, tipo, documento, tipo_forn, responsavel, email, telefone, descricao, obs, status, dt_reg, dt_alt)
VALUES
(1, 'FR001', 'Fornecedor A', 'PJ', '12345678000199', 'SERVICO', 'João Ferreira', 'joao@fornecedora.com', '11987654321', 'Serviços de limpeza', '', '1', '2023-09-01 13:00:00', NULL),
(1, 'FR002', 'Fornecedor B', 'PJ', '98765432000199', 'PRODUTOS', 'Maria Almeida', 'maria@fornecedorb.com', '11912345678', 'Produtos de escritório', '', '1', '2023-09-01 13:15:00', NULL),
(2, 'FR003', 'Fornecedor C', 'PF', '12345678901', 'AMBOS', 'Carlos Souza', 'carlos@fornecedorC.com', '11987654322', 'Serviços e produtos diversos', '', '1', '2023-09-01 13:30:00', NULL),
(2, 'FR004', 'Fornecedor D', 'PJ', '32165487000199', 'PRODUTOS', 'Ana Costa', 'ana@fornecedord.com', '11965432111', 'Fornecimento de móveis', '', '1', '2023-09-01 13:45:00', NULL),
(1, 'FR005', 'Fornecedor E', 'PJ', '45678912000199', 'SERVICO', 'Pedro Lima', 'pedro@fornecedore.com', '11976543211', 'Manutenção predial', '', '1', '2023-09-01 14:00:00', NULL),
(3, 'FR006', 'Fornecedor F', 'PF', '78945612301', 'AMBOS', 'Juliana Silva', 'juliana@fornecedorf.com', '11965432199', 'Consultoria e produtos', '', '1', '2023-09-01 14:15:00', NULL),
(1, 'FR007', 'Fornecedor G', 'PJ', '258963147000199', 'PRODUTOS', 'Marcos Lima', 'marcos@fornecedorg.com', '11912341234', 'Equipamentos de TI', '', '1', '2023-09-01 14:30:00', NULL),
(2, 'FR008', 'Fornecedor H', 'PJ', '159753486000199', 'SERVICO', 'Fernanda Gonçalves', 'fernanda@fornecedorh.com', '11987656789', 'Serviços de segurança', '', '1', '2023-09-01 14:45:00', NULL),
(3, 'FR009', 'Fornecedor I', 'PF', '85274196301', 'SERVICO', 'Rafael Dias', 'rafael@fornecedori.com', '11912349876', 'Consultoria em TI', '', '1', '2023-09-01 15:00:00', NULL),
(3, 'FR010', 'Fornecedor J', 'ESTRANGEIRO', 'FR123456789', 'PRODUTOS', 'Camila Rocha', 'camila@fornecedorj.com', '11965476543', 'Fornecimento de peças automotivas', '', '1', '2023-09-01 15:15:00', NULL);
*/

INSERT INTO fornecedores (id_loja, codigo, fornecedor, tipo, documento, tipo_forn, responsavel, email, telefone, descricao, obs, status, dt_reg, dt_alt) VALUES
(1, 'QWERT-321-Q13B1', 'Fornecedor A', 'PJ', '12.345.678/0001-90', 'SERVICO', 'João Silva', 'fornecedorA@example.com', '11987654321', 'Descrição A', 'Observação 1', '1', NOW(), NOW()),
(1, 'QWERT-321-Q13B2', 'Fornecedor B', 'PF', '23.456.789-01', 'PRODUTOS', 'Maria Oliveira', 'fornecedorB@example.com', '11987654322', 'Descrição B', 'Observação 2', '1', NOW(), NOW()),
(1, 'QWERT-321-Q13B3', 'Fornecedor C', 'PJ', '34.567.890/0001-23', 'AMBOS', 'Pedro Santos', 'fornecedorC@example.com', '11987654323', 'Descrição C', 'Observação 3', '1', NOW(), NOW()),
(1, 'QWERT-321-Q13B4', 'Fornecedor D', 'PF', '45.678.901-34', 'SERVICO', 'Ana Costa', 'fornecedorD@example.com', '11987654324', 'Descrição D', 'Observação 4', '1', NOW(), NOW()),
(1, 'QWERT-321-Q13B5', 'Fornecedor E', 'PJ', '56.789.012/0001-45', 'PRODUTOS', 'Carlos Almeida', 'fornecedorE@example.com', '11987654325', 'Descrição E', 'Observação 5', '1', NOW(), NOW()),
(1, 'QWERT-321-Q13B6', 'Fornecedor F', 'PF', '67.890.123-56', 'AMBOS', 'Juliana Lima', 'fornecedorF@example.com', '11987654326', 'Descrição F', 'Observação 6', '1', NOW(), NOW()),
(1, 'QWERT-321-Q13B7', 'Fornecedor G', 'PJ', '78.901.234/0001-67', 'SERVICO', 'Roberto Pereira', 'fornecedorG@example.com', '11987654327', 'Descrição G', 'Observação 7', '1', NOW(), NOW()),
(1, 'QWERT-321-Q13B8', 'Fornecedor H', 'PF', '89.012.345-78', 'PRODUTOS', 'Mariana Souza', 'fornecedorH@example.com', '11987654328', 'Descrição H', 'Observação 8', '1', NOW(), NOW()),
(1, 'QWERT-321-Q13B9', 'Fornecedor I', 'PJ', '90.123.456/0001-89', 'AMBOS', 'Felipe Oliveira', 'fornecedorI@example.com', '11987654329', 'Descrição I', 'Observação 9', '1', NOW(), NOW()),
(1, 'QWERT-321-Q13B0', 'Fornecedor J', 'PF', '01.234.567-90', 'SERVICO', 'Sofia Martins', 'fornecedorJ@example.com', '11987654330', 'Descrição J', 'Observação 10', '1', NOW(), NOW());

select * from fornecedores;