<?php
namespace GoEat;

session_start();

require '../vendor/autoload.php';

$prato = Prato::find($_GET['id']);

$prato->update([['coluna' => 'disponivel', 'valor' => $prato->getDisponivel() == 1 ? 2 : 1, 'id' => $prato->getId()]]);

header('Location: ementa.php');

?>