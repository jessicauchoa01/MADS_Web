<?php

namespace GoEat;

session_start();

require '../vendor/autoload.php';

use GoEat\Prato;

$prato = Prato::find($_GET['id']);

$prato->update([['coluna' => 'disponivel', 'valor' => 1, 'id' => $prato->getId()]]);

$mensagem = urlencode('Prato Aceite');
header('Location: praPendente.php?erro=' . $mensagem);