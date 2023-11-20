<?php
namespace GoEat;

session_start();

require '../vendor/autoload.php';

use GoEat\Utilizador;
use GoEat\Encomenda;

$utilizador = Utilizador::find($_SESSION['id']);

$total = 0;
$resultados = $_SESSION['carrinho'];
foreach ($resultados as $id => $quantidade) {
    $prato = Prato::find($id);
    $total += $prato->getPreco() * $quantidade;
}
echo $total;

$encomenda = new Encomenda(date("D M d, Y G:i"), $utilizador->getEntidade(), $total);
$encomenda->save();

foreach ($resultados as $id => $quantidade) {
    $registo = new EncomendaPrato($encomenda->getId(), $id, $quantidade, 1);
    $registo->save();
}

$_SESSION['carrinho'] = [];


$mensagem = urlencode('A sua encomenda foi submetida com sucesso');
header('Location: pratos.php?sucesso=' . $mensagem); 

?>