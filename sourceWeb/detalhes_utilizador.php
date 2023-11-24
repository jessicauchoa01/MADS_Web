<?php
namespace GoEat;

require '../vendor/autoload.php';

include 'includes/top.php';

?>

<div class="container mt-4">

<h2>Ficha de Utilizador</h2>

<?php $utilizador = Utilizador::find($_GET['id']); ?>

<h5> <?php echo $utilizador->getPerfil() . " ID:" . $_GET['id']; ?> </h5>
    
<?php

    if (empty($utilizador)) {
        header('Location: 404.html');
        exit;
    }

?>

<div class="row">
    <div class="col">
        <table class="table table-hover table-bordered table-striped">
            <tr>
                <th>Nome</th>
                <td><?php echo $utilizador->getNome(); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $utilizador->getEmail(); ?></td>
            </tr>
        </table>
    </div>
</div>


</div>
<?php

include 'includes/footer.php';