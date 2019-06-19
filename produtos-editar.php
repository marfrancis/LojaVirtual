<?php include 'ler-json.php'; ?><!DOCTYPE html>
<html lang="pt">
<?php include_once "head.php";?>
<body>

</body>

<?php include_once "header.php";?>

<?php if (isset($_POST['nomeProduto'])): ?>
    <?php 
    $caminhoImg = $_POST['imagem_atual'];
    if(!empty($_FILES['arquivo']['name'])) {
        $caminhoImg = salvarFotoProduto();
    }
    updateProduto($_POST['id'],$_POST['nomeProduto'],$_POST['descProduto'],$_POST['precoProduto'],$caminhoImg);
    include 'ler-json.php';
    ?>
    <div class="alert alert-success" role="alert">
        Produto atualizado!
    </div>
<?php endif ?>

<main class="container">
    <section class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="jumbotron">

                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                    <input type="hidden" name="imagem_atual" value="<?php echo $produtos[$_GET['id']]['img'] ?>">

                    <div class="form-group">
                        <label for="nomeProduto">Nome do Produto</label>
                        <input value="<?php echo $produtos[$_GET['id']]['nome'] ?>" type="text" name="nomeProduto" class="form-control" id="nomeProduto" placeholder="digite o nome do produto">
                    </div>
                    <div class="form-group">
                        <label for="precoProduto">Preço do Produto</label>
                        <input value="<?php echo $produtos[$_GET['id']]['preco'] ?>" type="number" step="any" name="precoProduto" class="form-control" id="precoProduto" placeholder="Digite o preco">
                    </div>
                    <div class="form-group">
                        <label for="descProduto">Descrição do Produto</label>
                        <textarea name="descProduto" class="form-control" id="descProduto"><?php echo $produtos[$_GET['id']]['descricao'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imgProduto">Imagem do Produto</label>
                        <input type="file" name="arquivo">
                    </div>

                    <button class="btn btn-success" type="submit">Finalizar Cadastro</button>
                </form>

            </div>

        </div>
    </section>
</main>


</html>