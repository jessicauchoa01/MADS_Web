<?php
namespace GoEat;

require '../vendor/autoload.php';

include 'includes/top.php';


$total = 0;

$utilizador = Utilizador::find($_SESSION['id']);
$encomendas = Encomenda::search([['coluna' => 'cliente', 'operador' => '=' ,'valor' => $utilizador->getEntidade()]]);
$encomenda = $encomendas[count($encomendas)-1];
$resultados = $encomenda->getLista();
?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Prato</th>
                        <th class="text-end">Quantidade</th>
                        <th class="text-end">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        
                        foreach ($resultados as $resultado) {
                            $prato = Prato::find($resultado->getPrato());
                           
                    ?>
                        <tr>
                            <td><?php echo $prato->getNome();?></td>
                            <td class="text-end"><?php echo $resultado->getQuantidade()?> unidades</td>
                            <td class="text-end"><?php echo $resultado->getSituacao();?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php

include 'includes/footer.php';