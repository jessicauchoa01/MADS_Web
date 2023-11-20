<?php
namespace GoEat;

require '../vendor/autoload.php';

include 'includes/top.php';

use GoEat\Restaurante;
use GoEat\Morada;

?>

<div class="container mt-4">

<h2>Ficha de Restaurante <?php echo" # " . $_GET['id']; ?> </h2>

<?php 
$restaurante = Restaurante::find($_GET['id']);
$morada = Morada::find($restaurante->getMorada());

?>
    
<?php

    if (empty($restaurante)) {
        header('Location: 404.html');
        exit;
    }

?>

<div class="row">
    <div class="col">
        <table class="table table-hover table-bordered table-striped">
            <tr>
                <th>Nome</th>
                <td><?php echo $restaurante->getNome(); ?></td>
            </tr>
            <tr>
                <th>NIF</th>
                <td><?php echo $restaurante->getNif(); ?></td>
            </tr>
            <tr>
                <th>Designação</th>
                <td><?php echo $restaurante->getDesignacao(); ?></td>
            </tr>
            <tr>
                <th>Contactos</th>
                <td>
                    <li><?php echo $restaurante->getTelemovel(); ?></li>
                    <li><?php echo $restaurante->getTelefone(); ?></li>
                </td>
            </tr>
            <tr>
                <th>Website</th>
                <td><?php echo $restaurante->getUrl(); ?></td>
            </tr>
            <tr>
                <th>Morada</th>
                <td>
                    <div><?php echo $morada->getRua() . ', ' . $morada->getNumPorta() ?></div>
                    <div><?php echo $morada->getCodPostal(). ', ' . $morada->getLocalidade(). ' - ' . $morada->getPais(); ?></div>
                </td>
            </tr>
            <tr>
                <th>Funcionamento</th>
                <td>
                    <div><?php echo 
                    ($restaurante->getSegunda() ? 'Seg ' : '') . 
                    ($restaurante->getTerca() ? ' Ter ' : '') . 
                    ($restaurante->getQuarta() ? ' Qua ' : '') . 
                    ($restaurante->getQuinta() ? ' Qui ' : '') . 
                    ($restaurante->getSexta() ? ' Sex ' : '') . 
                    ($restaurante->getSabado() ? ' Sab ' : '') . 
                    ($restaurante->getDomingo() ? ' Dom' : '');?></div>
                    <div><?php echo 'Das ' . $restaurante->getAbertura() . ' às ' . $restaurante->getFecho() ?></div>
                </td>
            </tr>
            <tr>
                <th>Métodos Pagamento</th>
                <td>
                    <div><?php echo 
                    ($restaurante->getMbway() ? 'MBWay ' : '') . 
                    ($restaurante->getVisa() ? ' Visa ' : '') . 
                    ($restaurante->getMultibanco() ? ' Multibanco ' : '') . 
                    ($restaurante->getNumerario() ? ' Numerário ' : '');?></div>
                </td>
            </tr>
            <tr>
                <th>Responsável</th>
                <td>
                    <div><?php echo $restaurante->getResponsavel();?></div>
                    <div><?php echo $restaurante->getContactoResponsavel();?></div>
                </td>
            </tr>
        </table>
                <?php switch ($restaurante->getEstado()) {
                    case 1:?>
                        <a href="estadoResInativar.php?id=<?php echo $restaurante->getId(); ?>" class="btn btn-warning">Inativar</a>
                        <a href="estadoResBloquear.php?id=<?php echo $restaurante->getId(); ?>" class="btn btn-warning">Bloquear</a>
                        <?php break;
                    case 2:?>
                        <a href="estadoResAtivar.php?id=<?php echo $restaurante->getId(); ?>" class="btn btn-warning">Ativar</a>
                        <a href="estadoResBloquear.php?id=<?php echo $restaurante->getId(); ?>" class="btn btn-warning">Bloquear</a>
                        <?php break;
                    case 3:?>
                        <a href="estadoResAtivar.php?id=<?php echo $restaurante->getId(); ?>" class="btn btn-warning">Ativar</a>
                        <?php break;
                    case 4:?>
                        <a href="estadoResAtivar.php?id=<?php echo $restaurante->getId(); ?>" class="btn btn-warning">Aprovar</a>
                        <?php break;
                }?>
    </div>
</div>


</div>
<?php

include 'includes/footer.php';