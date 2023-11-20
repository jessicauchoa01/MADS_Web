<?php
include 'includes/top.php';
?>
    <div class="container mt-4">
        <div class="row mt-3">
            <div class="col">
                <h3>Registo de Utilizador</h3>
            </div>
        </div>

        <?php if(isset($_GET['erro'])){ ?>
            <p class='alert alert-danger'><?php echo urldecode($_GET['erro']); ?> </p>
        <?php } ?>
        <?php if(isset($_GET['sucesso'])){ ?>
            <p class='alert alert-success'><?php echo urldecode($_GET['sucesso']); ?> </p>
        <?php } ?>

        <div class="row mt-3">
            <div class="col">
                <form action="registoAdmAdicionar.php" method="post">
                    <div class="form-group mb-2">
                        <label for="text">Nome:</label>
                        <input name="nome" type="text" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="text">E-mail:</label>
                        <input name="email" type="email" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="text">Password:</label>
                        <input name="password" type="password" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label for="text">Confirmação:</label>
                        <input name="confirmacao" type="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 mb-4">Registar</button>
                </form>
            </div>
        </div>

<?php
include 'includes/bottom.php';
?>