<?php

namespace GoEat;

require '../vendor/autoload.php';

include 'includes/top.php';


$total = 0;

$utilizador = Utilizador::find($_SESSION['id']);

$encomendas = Encomenda::search([['coluna' => 'cliente', 'operador' => '=', 'valor' => $utilizador->getEntidade()]]);

$encomenda = $encomendas[count($encomendas) - 1];

if (!empty($encomenda)) {
    $resultados = $encomenda->getLista();
}

?>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <?php if (empty($encomenda)) { ?>
                    <h2 style="text-align: center; margin-top: 2rem; margin-bottom: 4rem">Ainda não efetuou nenhuma encomenda</h2>
                <?php

                    include 'includes/footer.php';

                    exit;

                    }

                ?>
                <h2>Última Encomenda:</h2>
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
                            <td><?php echo $prato->getNome(); ?></td>
                            <td class="text-end"><?php echo $resultado->getQuantidade() ?> unidades</td>
                            <td class="text-end"><?php echo $resultado->getSituacao(); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <h2 style="margin-top: 2rem">Histórico:</h2>
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

                    foreach ($encomendas as $encomenda) {
                        $lista = $encomenda->getLista();
                        foreach ($lista as $prato) {
                            $unidade = Prato::find($prato->getPrato());
                            ?>
                            <tr>
                                <td><?php echo $unidade->getNome(); ?></td>
                                <td class="text-end"><?php echo $prato->getQuantidade() ?> unidades</td>
                                <td class="text-end"><?php echo $prato->getSituacao(); ?></td>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php

include 'includes/footer.php';