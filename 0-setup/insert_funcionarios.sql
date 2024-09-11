/*
INSERT INTO funcionarios (id_loja, codigo, nome, cpf, email, senha, telefone, cargo, salario, obs, status, dt_entrada, dt_saida, dt_reg, dt_alt)
VALUES
(1, 'F001', 'João Silva', '12345678901', 'joao.silva@email.com', 'senha123', '11987654321', 'Gerente', 4500.50, 'Nenhuma', '1', '2023-01-15', NULL, '2023-09-01 10:00:00', NULL),
(1, 'F002', 'Maria Oliveira', '98765432101', 'maria.oliveira@email.com', 'senha123', '11912345678', 'Vendedor', 3200.00, 'Vendedor destaque', '1', '2023-03-20', NULL, '2023-09-01 10:15:00', NULL),
(2, 'F003', 'Carlos Pereira', '12312312399', 'carlos.pereira@email.com', 'senha456', '11987654322', 'Supervisor', 3800.00, '', '1', '2023-04-18', NULL, '2023-09-01 10:30:00', NULL),
(2, 'F004', 'Ana Souza', '32132132199', 'ana.souza@email.com', 'senha789', '11965432111', 'Atendente', 2900.00, '', '0', '2022-11-10', '2023-08-30', '2023-09-01 10:45:00', NULL),
(1, 'F005', 'Pedro Costa', '45645645688', 'pedro.costa@email.com', 'senhaabc', '11976543211', 'Analista', 3100.00, '', '1', '2022-07-25', NULL, '2023-09-01 11:00:00', NULL),
(3, 'F006', 'Juliana Santos', '78978978977', 'juliana.santos@email.com', 'senhaxyz', '11965432199', 'Auxiliar', 2500.00, '', '1', '2023-02-10', NULL, '2023-09-01 11:15:00', NULL),
(1, 'F007', 'Marcos Lima', '14725836911', 'marcos.lima@email.com', 'senha1234', '11912341234', 'Consultor', 2700.00, '', '1', '2023-06-15', NULL, '2023-09-01 11:30:00', NULL),
(2, 'F008', 'Fernanda Gonçalves', '96385274100', 'fernanda.goncalves@email.com', 'senha0987', '11987656789', 'Recepcionista', 2800.00, '', '1', '2022-09-10', NULL, '2023-09-01 11:45:00', NULL),
(1, 'F009', 'Rafael Dias', '85274196302', 'rafael.dias@email.com', 'senha5678', '11912349876', 'Analista de Vendas', 3200.00, 'Promovido', '1', '2023-05-05', NULL, '2023-09-01 12:00:00', NULL),
(3, 'F010', 'Camila Rocha', '15935725874', 'camila.rocha@email.com', 'senha1593', '11965476543', 'Coordenadora', 3400.00, '', '1', '2023-07-01', NULL, '2023-09-01 12:15:00', NULL);
*/

INSERT INTO funcionarios (id_loja, codigo, nome, cpf, email, senha, telefone, cargo, salario, obs, status, dt_entrada, dt_saida, dt_reg, dt_alt) VALUES
(1, 'QWERT-321-Q13B1', 'José Silva', '12345678901', 'jose.silva@imovelnet.com.br', 'senha123', '11987654321', 'Gerente', 5000.00, 'Observação 1', '1', '2024-01-01', NULL, NOW(), NOW()),
(1, 'QWERT-321-Q13B2', 'Ana Lima', '23456789012', 'ana.lima@imovelnet.com.br', 'senha123', '11987654322', 'Assistente', 2800.00, 'Observação 2', '1', '2024-01-01', NULL, NOW(), NOW()),
(1, 'QWERT-321-Q13B3', 'Carlos Souza', '34567890123', 'carlos.souza@imovelnet.com.br', 'senha123', '11987654323', 'Corretor', 3500.00, 'Observação 3', '1', '2024-01-01', NULL, NOW(), NOW()),
(1, 'QWERT-321-Q13B4', 'Mariana Costa', '45678901234', 'mariana.costa@imovelnet.com.br', 'senha123', '11987654324', 'Recepcionista', 2200.00, 'Observação 4', '1', '2024-01-01', NULL, NOW(), NOW()),
(1, 'QWERT-321-Q13B5', 'Pedro Almeida', '56789012345', 'pedro.almeida@imovelnet.com.br', 'senha123', '11987654325', 'Zelador', 2000.00, 'Observação 5', '1', '2024-01-01', NULL, NOW(), NOW()),
(1, 'QWERT-321-Q13B6', 'Juliana Pereira', '67890123456', 'juliana.pereira@imovelnet.com.br', 'senha123', '11987654326', 'Marketing', 3200.00, 'Observação 6', '1', '2024-01-01', NULL, NOW(), NOW()),
(1, 'QWERT-321-Q13B7', 'Roberto Oliveira', '78901234567', 'roberto.oliveira@imovelnet.com.br', 'senha123', '11987654327', 'Financeiro', 4000.00, 'Observação 7', '1', '2024-01-01', NULL, NOW(), NOW()),
(1, 'QWERT-321-Q13B8', 'Marcos Fernandes', '89012345678', 'marcos.fernandes@imovelnet.com.br', 'senha123', '11987654328', 'TI', 2700.00, 'Observação 8', '1', '2024-01-01', NULL, NOW(), NOW()),
(1, 'QWERT-321-Q13B9', 'Sofia Costa', '90123456789', 'sofia.costa@imovelnet.com.br', 'senha123', '11987654329', 'Vendas', 3300.00, 'Observação 9', '1', '2024-01-01', NULL, NOW(), NOW()),
(1, 'QWERT-321-Q13B0', 'Ricardo Lima', '01234567890', 'ricardo.lima@imovelnet.com.br', 'senha123', '11987654330', 'Logística', 2900.00, 'Observação 10', '1', '2024-01-01', NULL, NOW(), NOW());

select * from funcionarios;