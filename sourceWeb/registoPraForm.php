<?php include 'includes/top.php'; 

require '../vendor/autoload.php';

use GoEat\Tipo;

$resultados = Tipo::search();
?>

<div class="container">
	<h2 class="mt-4 mb-2">Novo Prato</h2>

	<?php if(isset($_GET['erro'])){ ?>
            <p class='alert alert-danger'><?php echo urldecode($_GET['erro']); ?> </p>
        <?php } ?>
        <?php if(isset($_GET['sucesso'])){ ?>
            <p class='alert alert-success'><?php echo urldecode($_GET['sucesso']); ?> </p>
    <?php } ?>

	<form method="POST" action="registoPraAdicionar.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formFile" class="form-label">Escolha uma imagem</label>
            <input class="form-control" type="file" name="imagem">
        </div>
		<div class="form-group mb-2">
			<label for="text">Nome:</label>
			<input name="nome" type="text" class="form-control">
		</div>
        <div class="row">
            <div class="col form-group mb-2">
                <label for="text">Preço:</label>
                <input name="preco" type="text" class="form-control">
            </div>
            <div class="col form-group mb-2">
                <label for="text">Tipo:</label>
                <select class="form-select" name="tipo" aria-label="Default select example">
                    <option selected>---</option>
                    <?php foreach ($resultados as $resultado){ ?>
                    <option  value="<?php echo $resultado->getId();?>"><?php echo $resultado->getTipo();?></option>
                    <?php }; ?>
                </select>
            </div>
        </div>
		<div class="form-group mb-2">
			<label for="text">Descrição:</label>
			<input name="descricao" type="text" class="form-control">
		</div> 
		<button type="submit" class="btn btn-primary mt-2 mb-4">Registar</button>
	</form>
</div>

<?php include 'includes/bottom.php'; ?>