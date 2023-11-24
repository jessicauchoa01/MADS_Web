<?php

namespace GoEat;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require '../vendor/autoload.php';

use GoEat\Utilizador;

session_start();


if (isset($_SESSION['perfil'])){
    header('Location: index.php');
}

$resultados = Utilizador::search([['coluna' => 'email', 'operador' => '=' ,'valor' => $_POST['email']]]);

if (count($resultados) != 1){
    $mensagem = urlencode('Não existe nenhum utilizador com este email');
    header('Location: login.php?erro=' . $mensagem);
    exit;
}

$utilizador = $resultados[0];

if($utilizador->getAtivo() == 1){
    if (password_verify($_POST['password'], $utilizador->getPassword())){
            $_SESSION['perfil'] = $utilizador->getPerfil();
            $_SESSION['id'] = $utilizador->getId();
            $_SESSION['carrinho'] = [];
            header('Location: index.php');
    }else{
        $mensagem = urlencode('Utilizador ou palavra-passe inválidos');
        header('Location: login.php?erro=' . $mensagem);
    }
}else{
    $mensagem = urlencode('Utilizador inativo. Contacte o suporte.');
    header('Location: login.php?erro=' . $mensagem);
}
