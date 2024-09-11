/*
INSERT INTO `imoveis` 
( `id_loja`, `codigo`, `tipo_imovel`, `qtd_comodos`, `m2`, `qtd_fotos`, `endereco`, `endereco_numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `obs`, `status`, `dt_reg`, `dt_alt`) 
VALUES
(1, '2L86P-3XD-47JMTPE', 'CASA', 4, 120, 5,       '', '', '', '', '', '','', 'Ótimo estado',         '1', '2024-08-26 10:15:00', '2024-08-26 10:15:00'),
(1, 'TWAZD-ECG-2KGDLTQ', 'APTO', 3, 85, 4,        '', '', '', '', '','', '', 'Vista para o parque',  '1', '2024-08-26 10:20:00', '2024-08-26 10:20:00'),
(1, 'X27AH-3FV-E85VFZ4', 'TERRENO', 0, 500, 3,    '', '', '', '', '','', '', 'Terreno plano',        '1', '2024-08-26 10:25:00', '2024-08-26 10:25:00'),
(1, 'ALD75-HP0-EHZC3KA', 'LOJA', 6, 200, 2,       '', '', '', '', '','', '', 'Loja ampla',           '1', '2024-08-26 10:30:00', '2024-08-26 10:30:00'),
(1, '9K7TG-C1H-GF24YP5', 'COBERTURA', 5, 180, 5,  '', '', '', '', '','', '', 'Vista para o mar',     '1', '2024-08-26 10:35:00', '2024-08-26 10:35:00'),
(1, '23A94-62U-ATERXCD', 'CASA', 7, 250, 4,       '', '', '', '', '','', '', 'Casa com piscina',     '1', '2024-08-26 10:40:00', '2024-08-26 10:40:00'),
(1, 'R8UK2-8L1-XQTGKZL', 'APTO', 2, 60, 3,        '', '', '', '', '','', '', 'Frente para os mar',    '1', '2024-08-26 10:45:00', '2024-08-26 10:45:00'),
(1, 'QV1XT-RY2-186A3KL', 'TERRENO', 0, 750, 2,    '', '', '', '', '','', '', 'Terreno de esquina',   '1', '2024-08-26 10:50:00', '2024-08-26 10:50:00'),
(1, 'FG1YQ-AM7-56UKW94', 'LOJA', 4, 150, 4,       '', '', '', '', '','', '', 'Local movimentado',    '1', '2024-08-26 10:55:00', '2024-08-26 10:55:00'),
(1, 'XHQUK-6EK-57K16D8', 'COBERTURA', 6, 220, 4,  '', '', '', '', '','', '', 'Cobertura duplex',     '1', '2024-08-26 11:00:00', '2024-08-26 11:00:00');
*/

INSERT INTO imoveis (id_cliente, id_loja, codigo, tipo_imovel, qtd_comodos, m2, qtd_fotos, endereco, endereco_numero, bairro, complemento, cidade, estado, cep, obs, status, dt_reg, dt_alt) VALUES
(1, 1, 'QWERT-321-Q13B1', 'CASA', 3, 100.00, 10, 'Rua das Flores', '100', 'Jardim', 'Apto 1', 'São Paulo', 'SP', '01234567', 'Observação 1', '1', NOW(), NOW()),
(2, 1, 'QWERT-321-Q13B2', 'APTO', 2, 80.00, 8, 'Av. Paulista', '200', 'Centro', NULL, 'São Paulo', 'SP', '02345678', 'Observação 2', '1', NOW(), NOW()),
(3, 1, 'QWERT-321-Q13B3', 'TERRENO', NULL, NULL, 5, 'Rua da Liberdade', '300', 'Liberdade', NULL, 'São Paulo', 'SP', '03456789', 'Observação 3', '1', NOW(), NOW()),
(4, 1, 'QWERT-321-Q13B4', 'LOJA', NULL, NULL, 15, 'Rua das Acácias', '400', 'Jardim das Acácias', 'Casa 2', 'São Paulo', 'SP', '04567890', 'Observação 4', '1', NOW(), NOW()),
(5, 1, 'QWERT-321-Q13B5', 'COBERTURA', 4, 200.00, 12, 'Rua dos Jasmins', '500', 'Vila Nova', NULL, 'São Paulo', 'SP', '05678901', 'Observação 5', '1', NOW(), NOW()),
(6, 1, 'QWERT-321-Q13B6', 'CASA', 3, 120.00, 7, 'Av. dos Bandeirantes', '600', 'Itaim Bibi', 'Sala 301', 'São Paulo', 'SP', '06789012', 'Observação 6', '1', NOW(), NOW()),
(7, 1, 'QWERT-321-Q13B7', 'APTO', 2, 70.00, 6, 'Rua dos Girassóis', '700', 'Vila Mariana', NULL, 'São Paulo', 'SP', '07890123', 'Observação 7', '1', NOW(), NOW()),
(8, 1, 'QWERT-321-Q13B8', 'TERRENO', NULL, NULL, 3, 'Rua das Palmeiras', '800', 'Campo Belo', 'Casa 5', 'São Paulo', 'SP', '08901234', 'Observação 8', '1', NOW(), NOW()),
(9, 1, 'QWERT-321-Q13B9', 'LOJA', NULL, NULL, 8, 'Av. Ibirapuera', '900', 'Itaquera', NULL, 'São Paulo', 'SP', '09012345', 'Observação 9', '1', NOW(), NOW()),
(10, 1, 'QWERT-321-Q13B0', 'COBERTURA', 4, 250.00, 9, 'Rua do Pequi', '1000', 'Vila Sônia', NULL, 'São Paulo', 'SP', '10123456', 'Observação 10', '1', NOW(), NOW());

select * from imoveis;