<?php
// Inclua a conexão com o banco de dados
include 'conexao.php';

// Definir tempo de execução ilimitado e aumentar o limite de memória
set_time_limit(0);
ini_set('memory_limit', '1024M');

// Função para remover acentos e caracteres especiais
function removerAcentos($texto) {
    $acentos = array(
        'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a', 'é' => 'e', 'ê' => 'e', 'í' => 'i',
        'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ú' => 'u', 'ç' => 'c',
        'Á' => 'A', 'À' => 'A', 'Ã' => 'A', 'Â' => 'A', 'É' => 'E', 'Ê' => 'E', 'Í' => 'I',
        'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ú' => 'U', 'Ç' => 'C'
    );
    return strtr($texto, $acentos);
}

// Caminho para o arquivo CSV
$arquivo_csv = 'arquivo_ceps.csv'; // Substitua pelo caminho correto

// Abrir o arquivo CSV
if (($handle = fopen($arquivo_csv, "r")) !== FALSE) {
    // Ignorar a primeira linha do arquivo (cabeçalhos)
    fgetcsv($handle, 500, ";");

    // Preparar a consulta SQL fora do loop para melhorar o desempenho
    $sql = "INSERT INTO ceps (cep, endereco, bairro, cidade, estado) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a consulta: " . $conn->error);
    }

    $linhas_processadas = 0;

    // Ler cada linha do arquivo CSV
    while (($data = fgetcsv($handle, 500, ";")) !== FALSE) {
        // Verificar se a linha tem a quantidade esperada de colunas (5)
        if (count($data) < 5) {
            echo "Linha com dados faltando: " . implode(";", $data) . "<br>";
            continue;
        }

        // Remover acentos de cada campo
        $cep = removerAcentos($data[0]);
        $endereco = removerAcentos($data[1]);
        $bairro = removerAcentos($data[2]);
        $cidade = removerAcentos($data[3]);
        $estado = removerAcentos($data[4]);

        // Realizar o bind e a execução da query
        $stmt->bind_param("sssss", $cep, $endereco, $bairro, $cidade, $estado);

        if (!$stmt->execute()) {
            echo "Erro ao inserir os dados: " . $stmt->error . "<br>";
        }

        $linhas_processadas++;

        // Exibir a quantidade de linhas processadas a cada 1000 linhas
        if ($linhas_processadas % 500 == 0) {
            echo "Linhas processadas: $linhas_processadas<br>";
            // Descarregar a memória do buffer de resultados do MySQL
            //$conn->query("RESET QUERY CACHE");
        }
    }

    echo "Importação concluída. Total de linhas processadas: $linhas_processadas<br>";

    fclose($handle);
} else {
    echo "Erro ao abrir o arquivo CSV.";
}
?>
