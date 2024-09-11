<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>PHP Orientado a Objetos</title>        
  </head>
  <body>
    <h2>Classes e Objetos</h2>
    <?php
        // Chama o arquivo que contém a classe Imovel
        require 'Imovel.php';
        
        // Instancia um novo objeto Imovel
        $imovel = Imovel::cadastrar('100m2', 200000, 'Apartamento', 3);
        
        // Lista as informações do imóvel
        $info = $imovel->listar();

        echo "<p>Tamanho: " . $info['Tamanho'] . "</p>";
        echo "<p>Preço: " . $info['Preço'] . "</p>";
        echo "<p>Tipo: " . $info['Tipo'] . "</p>";
        echo "<p>Cômodos: " . $info['Cômodos'] . "</p>";
    ?>
  </body>
</html>