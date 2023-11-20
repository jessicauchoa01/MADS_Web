<?php
namespace GoEat;

require '../vendor/autoload.php';

use GoEat\Restaurante;

include 'includes/top.php';

?>

<div class="container">
    <div class="row mt-3 mb-3">
        <div class="col">
        <?php if(isset($_GET['erro'])){ ?>
            <p class='alert alert-success'><?php echo urldecode($_GET['erro']); ?> </p>
        <?php } ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>NIF</th>
                        <th>Designação</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $resultados = Restaurante::search([['coluna' => 'estado', 'operador' => '=' ,'valor' => 4]]);
                        foreach ($resultados as $resultado) {
                    ?>
                        <tr>
                            <td><?php echo $resultado->getNome();?></td>
                            <td><?php echo $resultado->getNif();?></td>
                            <td><?php echo $resultado->getDesignacao();?></td>
                            <td class="text-end">
                                <a href="detalhes_restaurante.php?id=<?php echo $resultado->getId(); ?>" class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-info fa-fw"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>    
</div>
<?php

include 'includes/footer.php';