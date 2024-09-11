<?php

class Imovel {
    private $tamanho;
    private $preco;
    private $tipo;
    private $comodos;

    public function __construct($tamanho, $preco, $tipo, $comodos) {
        $this->tamanho = $tamanho;
        $this->preco = $preco;
        $this->tipo = $tipo;
        $this->comodos = $comodos;
    }

    // Método para listar informações do imóvel
    public function listar() {
        return [
            'Tamanho' => $this->tamanho,
            'Preço' => $this->preco,
            'Tipo' => $this->tipo,
            'Cômodos' => $this->comodos,
        ];
    }

    // Método para cadastrar (criar) um novo imóvel
    public static function cadastrar($tamanho, $preco, $tipo, $comodos) {
        return new Imovel($tamanho, $preco, $tipo, $comodos);
    }

    // Método para deletar o imóvel (setando todos os atributos como null)
    public function deletar() {
        $this->tamanho = null;
        $this->preco = null;
        $this->tipo = null;
        $this->comodos = null;
    }

    // Método para editar as informações do imóvel
    public function editar($tamanho, $preco, $tipo, $comodos) {
        $this->tamanho = $tamanho;
        $this->preco = $preco;
        $this->tipo = $tipo;
        $this->comodos = $comodos;
    }
}

// Exemplo de uso:
$imovel = Imovel::cadastrar('100m2', 200000, 'Apartamento', 3);
print_r($imovel->listar());

$imovel->editar('120m2', 220000, 'Apartamento', 4);
print_r($imovel->listar());

$imovel->deletar();
print_r($imovel->listar());

?>
