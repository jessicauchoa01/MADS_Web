<?php
namespace GoEat;

require '../vendor/autoload.php';

use GoEat\Prato;

include 'includes/top.php';

$utilizador = Utilizador::find($_SESSION['id']);
$pratos = Prato::search([['coluna' => 'restaurante', 'operador' => '=' ,'valor' => $utilizador->getEntidade()]]);

?>

<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col">
            <a href="registoPraForm.php" class="btn btn-warning ">Novo Prato</a>
        </div>
    </div>
    <div class="row mb-5">
        <?php foreach ($pratos as $prato) {
            if($prato->getDisponivel() != 4) {?>
                <div class="col-3 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo $prato->getImagem();?>" class="card-img-top" alt="..."style="width: 17.9rem; height: 11rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $prato->getNome();?></h5>
                            <p class="card-text"><?php echo $prato->getDescricao();?></p>
                            <div class="d-flex align-items-end justify-content-between">
                                <div><?php echo $prato->getPreco() . ' €';?></div>
                                <?php if($_SESSION['perfil'] == 'Cliente'){?>
                                    <div><a href="carrinho_adicionar.php?id=<?php echo $prato->getId();?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-shopping-cart fa-fw"></i></a></div>
                                <?php } ?>
                                <?php if($_SESSION['perfil'] == 'Restaurante'){?>
                                    <div><a href="pratoEstado.php?id=<?php echo $prato->getId();?>" class="btn btn-warning btn-sm"><?php echo $prato->getDisponivel() == 1 ?'Disponível':'Indisponivel';?></a></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div>
<?php

include 'includes/footer.php';