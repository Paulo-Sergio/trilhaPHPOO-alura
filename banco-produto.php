<?php
//require_once("conecta.php");
//
//class ProdutoDAO {
//    
//    private $conexao;
//    
//    function __construct($conexao) {
//        $this->conexao = $conexao;
//    }
//    
//    function listaProdutos() {
//        $produtos = array();
//        $resultado = mysqli_query($this->conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
//        while($produtoAtual = mysqli_fetch_assoc($resultado)) {
//            $categoria = new Categoria();
//            $categoria->nome = $produtoAtual['categoria_nome'];
//            $produto = new Produto($produtoAtual['nome'], $produtoAtual['preco'],
//                    $produtoAtual['descricao'], $categoria, $produtoAtual['usado']);
//
//            $produto->id = $produtoAtual['id'];
//            //ESTOU USANDO O CONSTRUTOR DE PRODUTO AGORA
////            $produto->nome = $produtoAtual['nome'];
////            $produto->setPreco($produtoAtual['preco']);
////            $produto->descricao = $produtoAtual['descricao'];
////            $produto->categoria = $categoria;
////            $produto->usado = $produtoAtual['usado'];
//
//            array_push($produtos, $produto);
//        }
//        return $produtos;
//    }
//
//    function insereProduto(Produto $produto) {
//        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->nome}', {$produto->getPreco()}, '{$produto->descricao}', {$produto->categoria->id}, {$produto->usado})";
//        return mysqli_query($this->conexao, $query);
//    }
//    function alteraProduto($id, $nome, $preco, $descricao, $categoria_id, $usado) {
//        $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
//        return mysqli_query($this->conexao, $query);
//    }
//
//
//    function buscaProduto($id) {
//        $query = "select * from produtos where id = {$id}";
//        $resultado = mysqli_query($this->conexao, $query);
//        return mysqli_fetch_assoc($resultado);
//    }
//
//    function removeProduto($id) {
//        $query = "delete from produtos where id = {$id}";
//        return mysqli_query($this->conexao, $query);
//    }
//
//}