<?php

abstract class Produto {

    public $id;
    public $nome;
    private $preco;
    public $descricao;
    public $categoria;
    public $usado;
    
    function __construct($nome = "Produto indefinido", $preco = 99999, 
            $descricao = "contate o administrador", Categoria $categoria, $usado = "sim") {
        $this->nome = $nome;
        $this->setPreco($preco);
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;
    }
    
    function __toString() {
        return $this->nome.":".$this->preco."<br>";
    }
    
    abstract public function calculaPrecoDeVenda();
    
    public function temIsbn() {
        return $this instanceof Livro;
    }
    
    public function calculaImposto() {
        return $this->getPreco() * 0.195;
    }

    public function valorComDesconto($valorDesconto = 0.1) {
        if($valorDesconto > 0 && $valorDesconto <= 0.5){
            $this->setPreco($this->preco -= $this->preco * $valorDesconto);
        }
        return $this->preco; 
    }
    
    public function setPreco($preco){
        if($preco > 0){
            $this->preco = $preco;
        }
    }
    
    public function getPreco(){
        return $this->preco;
    }
}
