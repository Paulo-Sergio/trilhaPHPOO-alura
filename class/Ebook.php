<?php

class Ebook extends Livro{
    
    public function calculaPrecoDeVenda() {
        return $this->getPreco() + $this->getPreco() * 0.15;
    }

    public $marcaDaAgua;
}