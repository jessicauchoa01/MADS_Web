<?php include 'includes/top.php'; ?>

<div class="container">
	<h2 class="mt-4 mb-2">Novo Cliente</h2>
	<?php if(isset($_GET['erro'])){ ?>
            <p class='alert alert-danger'><?php echo urldecode($_GET['erro']); ?> </p>
        <?php } ?>
        <?php if(isset($_GET['sucesso'])){ ?>
            <p class='alert alert-success'><?php echo urldecode($_GET['sucesso']); ?> </p>
        <?php } ?>
	<form method="POST" action="registoCliAdicionar.php">
		<div class="form-group mb-2">
			<label for="text">Nome:</label>
			<input name="nome" type="text" class="form-control">
		</div>
		<div class="form-group mb-2">
			<label for="text">Nº Contribuinte:</label>
			<input name="nif" type="text" class="form-control">
		</div>
		<div class="form-group mb-2">
			<label for="text">Telemóvel:</label>
			<input name="telemovel" type="text" class="form-control">
		</div>
		<div class="form-group mb-2">
				<label for="text">Rua:</label>
				<input name ="rua" type="text" class="form-control">
		</div>
		<div class="row mb-2">
			<div class="form-group col">
				<label for="text">Número:</label>
				<input name ="numPorta" type="text" class="form-control">
			</div>
			<div class="form-group col">
				<label for="text">Código Postal:</label>
				<input name ="codPostal" type="text" class="form-control">
			</div>
		</div>
		<div class="row mb-2">
			<div class="form-group col">
				<label for="text">Location:</label>
				<input name ="localidade" type="text" class="form-control">
			</div>
			<div class="form-group col">
				<label for="text">País:</label>
				<input name ="pais" type="text" class="form-control">
			</div>
		</div>
		<div class="form-group mb-2">
				<label for="email">Email:</label>
				<input name ="email" type="text" class="form-control">
		</div>
		<div class="row mb-2">
			<div class="form-group col">
				<label for="text">Password:</label>
				<input name ="password" type="password" class="form-control">
			</div>
			<div class="form-group col">
				<label for="text">Confirmar Password:</label>
				<input name ="confirmacao" type="password" class="form-control">
			</div>
		</div>
       
		<button type="submit" class="btn btn-primary mt-2 mb-4">Registar</button>
	</form>
</div>

<?php include 'includes/bottom.php'; ?>