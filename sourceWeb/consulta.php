<?php

namespace GoEat;

session_start();

require '../vendor/autoload.php';

$utilizador = Utilizador::find($_SESSION['id']);
$restaurante = Restaurante::find($utilizador->getEntidade());
$ementa = $restaurante->getEmenta();
$nome = [];
$quantidade = [];
$data = [];
foreach($ementa as $id){
    $encomendas = EncomendaPrato::search([['coluna' => 'prato', 'operador' => '=' ,'valor' => $id]]);
    
    foreach ($encomendas as $encomenda){
        $prato = Prato::find($encomenda->getPrato());
        
        if (isset($quantidade[$id])) {
            $quantidade[$id] += $encomenda->getQuantidade();
        } else {
            $quantidade[$id] = $encomenda->getQuantidade();
            $nome []= $prato->getNome(); 
        }
    }
}
foreach ($quantidade as $pos => $element){
    if ($element != null){
        $data[] = $element; 
    }
}

// Cria um objeto com a chave 'data' contendo o array de valores
$jsonObject = array('data' => $data, 'nome'=>$nome);

// Converte o objeto para JSON
$json = json_encode($jsonObject);

// Retorna o JSON como resposta
header('Content-Type: application/json');
echo $json;

?>