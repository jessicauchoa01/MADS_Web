<?php

namespace GoEat;

require '../vendor/autoload.php';

session_start(); 

use GoEat\Utilizador;

if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirmacao'])) {
    $mensagem = urlencode('Todos os campos são de preenchimento obrigatório.');
    header('Location: registoAdmForm.php?erro=' . $mensagem);
    exit;
} else {
    if (strlen($_POST['password']) < 8) {
        $mensagem = urlencode('A palavra-passe tem de ter no mínimo 8 caracteres.');
        header('Location: registoAdmForm.php?erro=' . $mensagem);
        exit;
    }

    if ($_POST['password'] != $_POST['confirmacao']){
        $mensagem = urlencode('A palavra-passe e a confirmação tem que ser iguais.');
        header('Location: registoAdmForm.php?erro=' . $mensagem);
        exit;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $mensagem = urlencode('O email tem que ser um endereço válido');
        header('Location: registoAdmForm.php?erro=' . $mensagem);
        exit;
    }

    $resultados = Utilizador::search([['coluna' => 'email', 'operador' => '=' ,'valor' => $_POST['email']]]);

    if (count($resultados) != 0){
        $mensagem = urlencode('o email está a ser utilizado');
        header('Location: registoAdmForm.php?erro=' . $mensagem);
        exit;
    }
}

$utilizador = new Utilizador($_POST['nome'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), 1, 1);

$utilizador->save();

$mensagem = urlencode('Utilizador criado com sucesso');
header('Location: registoAdmForm.php?sucesso=' . $mensagem);