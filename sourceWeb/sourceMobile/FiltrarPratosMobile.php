<?php

namespace GoEat;

require '../../vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    http_response_code(200);
    exit;
}

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $restaurantes = Restaurante::search([['coluna' => 'estado', 'operador' => '=', 'valor' => 1]]);

    $tipo_id= $_GET['tipo_id'];

    foreach ($restaurantes as $restaurante) {
        if (isset($tipo_id)) {
            $listaPratos = Prato::search([['coluna' => 'tipo', 'operador' => '=' ,'valor' => $tipo_id],['coluna' => 'restaurante', 'operador' => '=' ,'valor' => $restaurante->getId()]]);
            foreach ($listaPratos as $pratos) {
                $resultado[] = [
                    'id' => $pratos->getId(),
                    'nome' => $pratos->getNome(),
                    'descricao' => $pratos->getDescricao(),
                    'preco' => $pratos->getPreco(),
                    'imagem' => $pratos->getImagem(),
                    'tipo' => $pratos->getTipo(),
                    'disponivel' => $pratos->getDisponivel(),
                    'restaurante' => $pratos->getRestaurante()
                ];
            }
        }
    }

    header('Content-Type: application/json');
    echo json_encode(array_reverse($resultado));
    http_response_code(200);
}
