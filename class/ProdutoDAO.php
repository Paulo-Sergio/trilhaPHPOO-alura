<?php
class ProdutoDAO {  
    
    private $conexao;
    
    function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    function listaProdutos() {
        $produtos = array();
        $resultado = mysqli_query($this->conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
        while($produtoAtual = mysqli_fetch_assoc($resultado)) {
            $categoria = new Categoria();
            $categoria->nome = $produtoAtual['categoria_nome'];
            
            if(strcasecmp($produtoAtual['tipoProduto'], 'LivroFisico') == 0){
                $produto = new LivroFisico($produtoAtual['nome'], $produtoAtual['preco'], $produtoAtual['descricao'], $categoria, $produtoAtual['usado']);
                $produto->setIsbn($produtoAtual['isbn']);
            }else if(strcasecmp($produtoAtual['tipoProduto'], 'Ebook') == 0){
                $produto = new Ebook($produtoAtual['nome'], $produtoAtual['preco'], $produtoAtual['descricao'], $categoria, $produtoAtual['usado']);
                $produto->setIsbn($produtoAtual['isbn']);
            }

            $produto->id = $produtoAtual['id'];
            //ESTOU USANDO O CONSTRUTOR DE PRODUTO AGORA
//            $produto->nome = $produtoAtual['nome'];
//            $produto->setPreco($produtoAtual['preco']);
//            $produto->descricao = $produtoAtual['descricao'];
//            $produto->categoria = $categoria;
//            $produto->usado = $produtoAtual['usado'];

            array_push($produtos, $produto);
        }
        return $produtos;
    }

    function insereProduto(Produto $produto) {
        if($produto->temIsbn()){
            $isbn = $produto->getIsbn();
        }else{
            $isbn = "";
        }
        $tipoProduto = get_class($produto);
        
        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto) values ('{$produto->nome}', {$produto->getPreco()}, '{$produto->descricao}', {$produto->categoria->id}, {$produto->usado}, '{$isbn}', '{$tipoProduto}')";
        return mysqli_query($this->conexao, $query);
    }
    function alteraProduto($id, $nome, $preco, $descricao, $categoria_id, $usado) {
        $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
        return mysqli_query($this->conexao, $query);
    }


    function buscaProduto($id) {
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function removeProduto($id) {
        $query = "delete from produtos where id = {$id}";
        return mysqli_query($this->conexao, $query);
    }

}