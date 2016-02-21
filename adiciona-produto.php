<?php require_once("cabecalho.php"); 
require_once("conecta.php");
require_once("banco-produto.php"); 
require_once("logica-usuario.php");
verificaUsuario();

$categoria = new Categoria();
$categoria->id = $_POST['categoria_id'];

//USANDO CONSTRUTOR DE PRODUTOS
//$produto->nome = $_POST['nome'];
//$produto->setPreco($_POST['preco']);
//$produto->descricao = $_POST['descricao'];
//$produto->categoria = $categoria;
if(array_key_exists('usado', $_POST)) {
    $usado = "true";
} else {
    $usado = "false";
}

if(strcasecmp($_POST['tipoProduto'], 'LivroFisico') == 0){
    $produto = new LivroFisico($_POST['nome'], $_POST['preco'], $_POST['descricao'], $categoria, $usado);
    $produto->setIsbn($_POST['isbn']);
}else if(strcasecmp($_POST['tipoProduto'], 'Ebook') == 0){
    $produto = new Ebook($_POST['nome'], $_POST['preco'], $_POST['descricao'], $categoria, $usado);
    $produto->setIsbn($_POST['isbn']);
}


$produtoDao = new ProdutoDAO($conexao);

if($produtoDao->insereProduto($produto)) { ?>
<p class="text-success">O produto <?= $produto->nome ?>, <?= $produto->getPreco() ?> foi adicionado.</p>
<?php } else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O produto <?= $produto->nome ?> não foi adicionado: <?= $msg?></p>
<?php
}
?>

<?php include("rodape.php"); ?>			
