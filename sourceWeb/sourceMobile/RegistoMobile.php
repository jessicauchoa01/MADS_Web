<?php
namespace GoEat;

header("Access-Control-Allow-Origin: no-cors");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    http_response_code(200);
    exit;
}

require '../../vendor/autoload.php';

// Habilita o CORS para permitir solicitações entre diferentes domínios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Método permitido para a solicitação
header("Access-Control-Allow-Methods: POST");

// Permite cabeçalhos específicos
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Inicia a sessão
session_start();

// Verifica se o método da solicitação é POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do corpo da solicitação
    $data = json_decode(file_get_contents("php://input"));

    // Verifica se os campos necessários estão presentes
    if (
        empty($data->nome)
        || empty($data->contribuinte)
        || empty($data->telemovel)
        || empty($data->rua)
        || empty($data->porta)
        || empty($data->localizacao)
        || empty($data->pais)
        || empty($data->codPostal)
        || empty($data->email)
        || empty($data->password)
        || empty($data->confirmacao)
    ) {
        echo json_encode(["message" => "Campos obrigatórios ausentes"]);
        http_response_code(400);
        exit;
    }

    // Procura o utilizador pelo e-mail
    $resultados = Utilizador::search([['coluna' => 'email', 'operador' => '=' ,'valor' => $data->email]]);

    // Verifica se há exatamente um utilizador com o e-mail fornecido
    if (count($resultados) != 0) {
        echo json_encode(["message" => "Já existe um utilizador com este e-mail"]);
        http_response_code(401);
        exit;
    }

    if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)){
        echo json_encode(["message" => "O email tem que ser um endereço válido."]);
        http_response_code(401);
        exit;
    }

    if (strlen($data->telemovel) < 9 || strlen($data->telemovel) > 9) {
        echo json_encode(["message" => "Número de telemóvel inválido."]);
        http_response_code(401);
        exit;
    }

    if (strlen($data->password) < 8) {
        echo json_encode(["message" => "A palavra-passe tem de ter no mínimo 8 caracteres."]);
        http_response_code(401);
        exit;
    }

    if ($data->password != $data->confirmacao){
        echo json_encode(["message" => "A palavra-passe e a confirmação tem que ser iguais."]);
        http_response_code(401);
        exit;
    }

    $moradas = Morada::search([
        ['coluna' => 'rua', 'operador' => '=' ,'valor' => $data->rua],
        ['coluna' => 'numPorta', 'operador' => '=' ,'valor' => $data->porta],
        ['coluna' => 'codPostal', 'operador' => '=' ,'valor' => $data->codPostal]]);

    if (count($moradas) == 0){
        $morada = new Morada($data->rua, $data->porta, $data->codPostal, $data->localizacao, $data->pais);
        $morada->save();
    }else{
        $morada = $moradas[0];
    }

    $cliente = new Cliente($data->nome, $data->contribuinte, $data->telemovel, $morada->getId(), 1);
    $cliente->save();

    $utilizador = new Utilizador($data->nome, $data->email, password_hash($data->password, PASSWORD_DEFAULT), 2, 1, $cliente->getId());
    $utilizador->save();

    echo json_encode(["message" => "Autenticação bem-sucedida"]);
    http_response_code(200);
    exit;
} else {
    // Se o método da solicitação não for POST
    echo json_encode(["message" => "Método não permitido"]);
    http_response_code(405);
    exit;
}
