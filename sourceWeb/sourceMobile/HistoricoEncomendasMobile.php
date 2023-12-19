<?php

namespace GoEat;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

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

    $token = $_GET['token'];

    $chave = "segredodogoeat";

    $tokenInfo = JWT::decode($token, new Key($chave, 'HS256'));

    $utilizador = Utilizador::find($tokenInfo->utilizador_id);

    $cliente_id = $utilizador->getEntidade();

    $encomendas = Encomenda::search([['coluna' => 'cliente', 'operador' => '=', 'valor' => $cliente_id]]);

    foreach ($encomendas as $encomenda) {
        $lista = $encomenda->getLista();
        foreach ($lista as $prato) {
            if ($prato->getSituacao() == 'Entregue') {
                $unidade = Prato::find($prato->getPrato());
                $resultado[] = [
                    'nome' => $unidade->getNome(),
                    'quantidade' => $prato->getQuantidade(),
                    'situacao' => $prato->getSituacao(),
                ];
            }
        }
    }

    header('Content-Type: application/json');
    echo json_encode(array_reverse($resultado));
    http_response_code(200);
}
