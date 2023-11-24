<?php
namespace GoEat;

require '../vendor/autoload.php';

include 'includes/top.php';


$utilizador = Utilizador::find($_SESSION['id']);
$pratos = Prato::search([['coluna' => 'restaurante', 'operador' => '=' ,'valor' => $utilizador->getEntidade()]]);

?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th># Encomenda</th>
                        <th>Prato</th>
                        <th class="text-end">Quantidade</th>
                        <th class="text-end">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($pratos as $prato){
                            $resultados = EncomendaPrato::search([
                            ['coluna' => 'prato', 'operador' => '=' ,'valor' => $prato->getId()],
                            ['coluna' => 'situacao', 'operador' => '<' ,'valor' => 4]
                            ]);
                            foreach ($resultados as $resultado) {
                                $encomenda = Encomenda::find($resultado->getEncomenda());
                                $cliente = Cliente::find($encomenda->getCliente());
                    ?>
                        <tr>
                            <td><?php echo $cliente->getNome();?></td>
                            <td><?php echo $encomenda->getId();?></td>
                            <td><?php echo $prato->getNome();?></td>
                            <td class="text-end"><?php echo $resultado->getQuantidade();?> unidades</td>
                            <td class="text-end">
                                <?php switch ($resultado->getSituacao()) {
                                        case 'Submetida':?>
                                            <a href="encomendaProcessar.php?id=<?php echo $resultado->getId()?>" class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-fire"></i>
                                            </a>
                                            <a href="encomendaCancelar.php?id=<?php echo $resultado->getId()?>" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-ban"></i>
                                            </a>
                                            <?php break;
                                        case 'Em Processamento':?>
                                            <a href="encomendaProcessar.php?id=<?php echo $resultado->getId()?>" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-bag-shopping"></i>                                            </a>
                                            <?php break;
                                        case 'Por Levantar':?>
                                            <a href="encomendaProcessar.php?id=<?php echo $resultado->getId()?>" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-thumbs-up"></i>
                                            </a>
                                            <?php break;
                                }?>
                            </td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php

include 'includes/footer.php';