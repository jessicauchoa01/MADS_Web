<?php
namespace GoEat;

require '../vendor/autoload.php';

include 'includes/top.php';


$total = 0;
?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Prato</th>
                        <th class="text-end">Quantidade</th>
                        <th class="text-end">Preço Uni</th>
                        <th class="text-end">Preço</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $resultados = $_SESSION['carrinho'];
                        foreach ($resultados as $id => $quantidade) {
                            $prato = Prato::find($id);
                            $total += $prato->getPreco() * $quantidade;
                    ?>
                        <tr>
                            <td><?php echo $prato->getNome();?></td>
                            <td class="text-end"><?php echo $quantidade?> unidades</td>
                            <td class="text-end"><?php echo number_format($prato->getPreco(), 2, ',', ' ');?> €</td>
                            <td class="text-end"><?php echo number_format($prato->getPreco() * $quantidade, 2, ',', ' ');?> €</td>
                            <td class="text-end">
                                <a href="carrinho_remover.php?id=<?php echo $id ?>" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td> <b>TOTAL</b></td>
                            <td></td>
                            <td></td>
                            <td class="text-end"><?php echo number_format($total, 2, ',', ' ');?> €</td>
                            <td></td>
                        </tr>
                </tbody>
            </table>
        </div>
        
    </div>
    <div class="d-flex flex-row-reverse"><a href="encomenda.php" ><button type="button"  class="btn btn-warning">Encomendar</button></a></div>
</div>
<?php

include 'includes/footer.php';