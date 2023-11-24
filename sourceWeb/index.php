<?php 

namespace GoEat;

include 'includes/top.php';
include 'includes/heroe.php';

require '../vendor/autoload.php';

use GoEat\Prato;
use GoEat\Restaurante;
use GoEat\Tipo;

$restaurantes = Restaurante::search([['coluna' => 'estado', 'operador' => '=' ,'valor' => 1]]);
$tipos = Tipo::search();
?>

<div class="container">
    <?php if (!isset($_SESSION['perfil']) || ($_SESSION['perfil']) == 'Cliente'){ ?>
        <h2 class="mt-5 mb-5"> O que deseja comer hoje?</h2>
        <div class="row">
            <?php foreach ($tipos as $tipo) {?>
                <div class="col mb-5">
                    <a href="pratos.php?id=<?php echo $tipo->getId();?>"  style="display: block; text-decoration: none">
                        <div class="card d-flex align-items-center ">
                            <div style= "padding-top: 2rem;">
                                <?php switch ($tipo->getId()) {
                                    case 1:?>
                                        <i class="fa-solid fa-shrimp fa-2xl"></i>
                                        <?php break;
                                    case 2:?>
                                        <i class="fa-solid fa-mug-hot fa-2xl"></i>
                                        <?php break;
                                    case 3:?>
                                        <i class="fa-solid fa-fish fa-2xl"></i>
                                        <?php break;
                                    case 4:?>
                                        <i class="fa-solid fa-drumstick-bite fa-2xl"></i>
                                        <?php break;
                                    case 5:?>
                                        <i class="fa-solid fa-seedling fa-2xl"></i>
                                        <?php break;
                                    case 6:?>
                                        <i class="fa-solid fa-ice-cream fa-2xl"></i>
                                        <?php break;
                                    case 7:?>
                                        <i class="fa-solid fa-martini-glass-citrus fa-2xl"></i>
                                        <?php break;
                                }?>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $tipo->getTipo();?></h4>    
                            </div>
                        </div>    
                    </a>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>


<?php include 'includes/bottom.php'; ?>
