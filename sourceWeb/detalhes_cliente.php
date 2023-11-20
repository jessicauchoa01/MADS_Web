<?php
namespace GoEat;

require '../vendor/autoload.php';

include 'includes/top.php';

use GoEat\Cliente;
use GoEat\Morada;

$cliente = Cliente::find($_GET['id']);
$morada = Morada::find($cliente->getMorada());

?>

<div class="container mt-4">

<h2>Ficha de Cliente<?php echo" # " . $_GET['id']; ?> </h2>


<?php

    if (empty($cliente)) {
        header('Location: 404.html');
        exit;
    }

?>

<div class="row">
    <div class="col">
        <table class="table table-hover table-bordered table-striped">
            <tr>
                <th>Nome</th>
                <td><?php echo $cliente->getNome(); ?></td>
            </tr>
            <tr>
                <th>NIF</th>
                <td><?php echo $cliente->getNif(); ?></td>
            </tr>
            <tr>
                <th>Contactos</th>
                <td>
                    <li><?php echo $cliente->getTelemovel(); ?></li>
                </td>
            </tr>
            <tr>
                <th>Morada</th>
                <td>
                    <div><?php echo $morada->getRua() . ', ' . $morada->getNumPorta() ?></div>
                    <div><?php echo $morada->getCodPostal(). ', ' . $morada->getLocalidade(). ' - ' . $morada->getPais(); ?></div>
                </td>
            </tr>
        </table>
                <?php switch ($cliente->getEstado()) {
                    case 1:?>
                        <a href="estadoCliInativar.php?id=<?php echo $cliente->getId(); ?>" class="btn btn-warning">Inativar</a>
                        <a href="estadoCliBloquear.php?id=<?php echo $cliente->getId(); ?>" class="btn btn-warning">Bloquear</a>
                        <?php break;
                    case 2:?>
                        <a href="estadoCliAtivar.php?id=<?php echo $cliente->getId(); ?>" class="btn btn-warning">Ativar</a>
                        <a href="estadoCliBloquear.php?id=<?php echo $cliente->getId(); ?>" class="btn btn-warning">Bloquear</a>
                        <?php break;
                    case 3:?>
                        <a href="estadoCliAtivar.php?id=<?php echo $cliente->getId(); ?>" class="btn btn-warning">Ativar</a>
                        <?php break;
                }?>
    </div>
</div>


</div>
<?php

include 'includes/footer.php';