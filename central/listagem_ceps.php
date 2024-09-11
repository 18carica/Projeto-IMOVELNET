<?php
include 'conexao.php';

// Consultar os dados da tabela ceps
$sql = "SELECT * FROM ceps";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de CEPs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h3 class="text-center">Listagem de CEPs - <?php echo 'Leandro Torres Mocelin'; ?></h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CEP</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id_cep']; ?></td>
                        <td><?php echo $row['cep']; ?></td>
                        <td><?php echo $row['endereco']; ?></td>
                        <td><?php echo $row['bairro']; ?></td>
                        <td><?php echo $row['cidade']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="gerar_pdf.php" class="btn btn-primary">Gerar PDF</a>
    </div>
</body>
</html>
