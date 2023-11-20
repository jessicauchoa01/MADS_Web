<?php
namespace GoEat;

session_start();

require '../vendor/autoload.php';


if (isset($_SESSION['carrinho'][$_GET['id']])) {
    $_SESSION['carrinho'][$_GET['id']]++;
} else {
    $_SESSION['carrinho'][$_GET['id']] = 1;
}

$mensagem = urlencode('O Prato foi adicionado ao carrinho');
header('Location: pratos.php?sucesso=' . $mensagem);

?>
