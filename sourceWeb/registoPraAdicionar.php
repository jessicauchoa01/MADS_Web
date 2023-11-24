<?php

namespace GoEat;

session_start();

require '../vendor/autoload.php';

use GoEat\Prato;


if (empty($_POST['nome']) || empty($_FILES['imagem']) || empty($_POST['preco']) || empty($_POST['tipo']) || empty($_POST['descricao'])) {
    $mensagem = urlencode('Todos os campos são de preenchimento obrigatório.');
    header('Location: registoPraForm.php?erro=' . $mensagem);
    exit;
} else {
    if (!empty($_FILES) && $_FILES['imagem']['size'] != 0) {
        if (file_exists($_FILES['imagem']['tmp_name'])) {
            copy($_FILES['imagem']['tmp_name'], 'assets/pratos/' . $_FILES['imagem']['name']);
        }
    }
}

$resultado = Utilizador::find($_SESSION['id']);

$prato = new Prato($_POST['nome'], $_POST['descricao'], $_POST['preco'], 'assets/pratos/' . $_FILES['imagem']['name'], $_POST['tipo'], 4, $resultado->getEntidade());
$prato->save();

$mensagem = urlencode('Prato criado com sucesso');
header('Location: registoPraForm.php?sucesso=' . $mensagem);