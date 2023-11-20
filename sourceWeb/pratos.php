<?php 

namespace GoEat;

include 'includes/top.php';

require '../vendor/autoload.php';

use GoEat\Prato;
use GoEat\Restaurante;
use GoEat\Tipo;

$today = date('l');

$restaurantes = Restaurante::search([['coluna' => 'estado', 'operador' => '=' ,'valor' => 1]]);

$tipos = Tipo::search();
?>
<div class="container mt-4">

<?php if(isset($_GET['sucesso'])){ ?>
    <p class='alert alert-success'><?php echo urldecode($_GET['sucesso']); ?> </p>
<?php } ?>    

<div class="row">
    <?php foreach ($tipos as $tipo) {?>
        <div class="col mb-5 mt-5">
            <a href="pratos.php?id=<?php echo $tipo->getId();?>"  style="display: block;">
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

<?php function pratos($pratos){?>
    <div class="row mb-5">
        <?php foreach ($pratos as $prato) {
            if($prato->getDisponivel() == 1) {?>
                <div class="col-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $prato->getImagem();?>" class="card-img-top" alt="..."style="width: 17.9rem; height: 11rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $prato->getNome();?></h5>
                            <p class="card-text"><?php echo $prato->getDescricao();?></p>
                            <div class="d-flex align-items-end justify-content-between">
                                <div><?php echo $prato->getPreco() . ' €';?></div>
                                <?php if(isset($_SESSION['perfil']) == 'Cliente'){?>
                                    <div><a href="carrinho_adicionar.php?id=<?php echo $prato->getId();?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-shopping-cart fa-fw"></i></a></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
<?php } ?>

    <?php 
    foreach($restaurantes as $restaurante){
        if ($restaurante->getOpen($today) == 1){
            if(isset($_GET['id'])){
                $pratos = Prato::search([['coluna' => 'tipo', 'operador' => '=' ,'valor' => $_GET['id']],['coluna' => 'restaurante', 'operador' => '=' ,'valor' => $restaurante->getId()]]);
                pratos($pratos);
            }else{
                $pratos = Prato::search([['coluna' => 'restaurante', 'operador' => '=' ,'valor' => $restaurante->getId()]]);?>
                <div class="d-flex align-items-center gap-4 mb-2">
                    <i class="fa-solid fa-utensils fa-2xl"></i>
                    <h2><?php echo $restaurante->getNome();?></h2>
                </div>
                <?php pratos($pratos);
            }
        }
    }
    ?>

</div>


<?php include 'includes/bottom.php'; ?>
