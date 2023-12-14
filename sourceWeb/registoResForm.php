<?php include 'includes/top.php';?>

<div class="container">
	<h2 class="mt-4 mb-2">Novo Restaurante</h2>
	<?php if(isset($_GET['erro'])){ ?>
            <p class='alert alert-danger'><?php echo urldecode($_GET['erro']); ?> </p>
        <?php } ?>
        <?php if(isset($_GET['sucesso'])){ ?>
            <p class='alert alert-success'><?php echo urldecode($_GET['sucesso']); ?> </p>
        <?php } ?>
	<form method="POST" action="registoResAdicionar.php" enctype="multipart/form-data">
		<div class="form-group mb-2">
			<label for="text">Nome:</label>
			<input name="nome" type="text" class="form-control">
		</div>
		<div class="form-group mb-2">
			<label for="text">Designação:</label>
			<input name="designacao" type="text" class="form-control">
		</div>
		<div class="form-group mb-2">
			<label for="text">Nº Contribuinte:</label>
			<input name="nif" type="text" class="form-control">
		</div>
		<div class="row mb-2">
			<div class="form-group col">
				<label for="text">Telemóvel:</label>
				<input name="telemovel" type="text" class="form-control">
			</div>
			<div class="form-group col">
				<label for="text">Telefone:</label>
				<input name="telefone" type="text" class="form-control">
			</div>
		</div>
		<div class="form-group mb-2">
			<label for="text">Website:</label>
			<input name="url" type="text" class="form-control">
		</div>
		<div class="row mb-2">
			<div class="form-group col">
				<label for="text">Responsável:</label>
				<input name="responsavel" type="text" class="form-control">
			</div>
			<div class="form-group col">
				<label for="text">Contacto do Responsável:</label>
				<input name="contactoResponsavel" type="text" class="form-control">
			</div>
		</div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Escolha uma imagem</label>
            <input class="form-control" type="file" name="imagem">
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

		<label for="text" class=" mt-3">Horário de Funcionamento:</label>
		<div class="row mb-2">
			<div class="form-group col mt-2 mb-2">
				<label for="text">Abertura:</label>
				<input name="abertura" type="time" class="form-control">
			</div>
			<div class="form-group col mt-2 mb-2">
				<label for="text">Fecho:</label>
				<input name="fecho" type="time" class="form-control">
			</div>
		</div>
		<div class="col mb-4 mt-2">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="segunda">
				<label class="form-check-label" for="inlineCheckbox2">Segunda</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="terca">
				<label class="form-check-label" for="inlineCheckbox2">Terça</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="quarta">
				<label class="form-check-label" for="inlineCheckbox2">Quarta</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="quinta">
				<label class="form-check-label" for="inlineCheckbox2">Quinta</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="sexta">
				<label class="form-check-label" for="inlineCheckbox2">Sexta</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="sabado">
				<label class="form-check-label" for="inlineCheckbox2">Sabado</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="domingo">
				<label class="form-check-label" for="inlineCheckbox2">Domingo</label>
			</div>
		</div>
		<label for="text">Métodos de Pagamento:</label>
		<div class="col mb-4 mt-2">
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="mbway">
				<label class="form-check-label" for="inlineCheckbox2">MBWay</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="visa">
				<label class="form-check-label" for="inlineCheckbox2">Visa</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="multibanco">
				<label class="form-check-label" for="inlineCheckbox2">Multibanco</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="checkbox" name="numerario">
				<label class="form-check-label" for="inlineCheckbox2">Numerario</label>
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