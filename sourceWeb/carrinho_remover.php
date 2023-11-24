<?php
namespace GoEat;

session_start();

require '../vendor/autoload.php';


if ($_SESSION['carrinho'][$_GET['id']] == 1) {
    unset($_SESSION['carrinho'][$_GET['id']]);
} else {
    $_SESSION['carrinho'][$_GET['id']]--;
}


header('Location: carrinho.php');

?>

