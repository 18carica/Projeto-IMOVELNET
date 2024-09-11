// buscar_cep.php
<?php
include 'conexao.php';

if (isset($_GET['cep'])) {
    $cep = $_GET['cep'];

    // Consultar o CEP no banco de dados
    $sql = "SELECT * FROM ceps WHERE codigo_IBGE_cep = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cep);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Se o CEP for encontrado, retorna as informações
        $cep_info = $result->fetch_assoc();
        echo json_encode($cep_info);
    } else {
        // Se o CEP não for encontrado, inserir na tabela 'ceps'
        $tipo_cep = 'Tipo padrão';  // Ajuste conforme necessário
        $subtipo_cep = 'Subtipo padrão';  // Ajuste conforme necessário
        $bairro_cep = 'Bairro padrão';  // Ajuste conforme necessário
        $cidade_cep = 'Cidade padrão';  // Ajuste conforme necessário
        $estado_cep = 'UF';  // Ajuste conforme necessário
        $complemento_cep = 'Complemento padrão';  // Ajuste conforme necessário
        $codigo_IBGE_cep = '0000000';  // Ajuste conforme necessário

        $sql_insert_cep = "INSERT INTO ceps (tipo_cep, subtipo_cep, uf_cep, cidade_cep, bairro_cep, endereco_cep, complemento_cep, codigo_IBGE_cep) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert_cep);
        $stmt_insert->bind_param("ssssssss", $tipo_cep, $subtipo_cep, $estado_cep, $cidade_cep, $bairro_cep, $cep, $complemento_cep, $codigo_IBGE_cep);
        
        if ($stmt_insert->execute()) {
            // Após a inserção, retorne as informações para preenchimento
            $cep_info = [
                'tipo_cep' => $tipo_cep,
                'subtipo_cep' => $subtipo_cep,
                'uf_cep' => $estado_cep,
                'cidade_cep' => $cidade_cep,
                'bairro_cep' => $bairro_cep,
                'endereco_cep' => $cep,
                'complemento_cep' => $complemento_cep,
                'codigo_IBGE_cep' => $codigo_IBGE_cep
            ];
            echo json_encode($cep_info);
        } else {
            echo json_encode(['error' => 'Erro ao inserir o CEP no banco de dados.']);
        }
    }
}
?>
