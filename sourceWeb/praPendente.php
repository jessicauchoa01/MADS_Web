<?php
namespace GoEat;

require '../vendor/autoload.php';

use GoEat\Prato;

include 'includes/top.php';

$resultados = Prato::search([['coluna' => 'disponivel', 'operador' => '=' ,'valor' => 4]]);

?>

<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col">
        <?php if(isset($_GET['erro'])){ ?>
            <p class='alert alert-success'><?php echo urldecode($_GET['erro']); ?> </p>
        <?php } ?>
            <div class="row">
                <?php
                    foreach ($resultados as $resultado) {
                ?>
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo $resultado->getImagem();?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $resultado->getNome();?></h5>
                                <p class="card-text"><?php echo $resultado->getDescricao()?></p>
                                <a href="praPendenteAceitar.php?id=<?php echo $resultado->getId(); ?>" class="btn btn-primary">Aprovar</a>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>    
</div>
<?php

include 'includes/footer.php';