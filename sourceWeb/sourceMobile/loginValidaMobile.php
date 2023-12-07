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
    if (empty($data->email) || empty($data->password)) {
        echo json_encode(["message" => "Campos obrigatórios ausentes"]);
        http_response_code(400);
        exit;
    }

    // Procura o utilizador pelo e-mail
    $resultados = Utilizador::search([['coluna' => 'email', 'operador' => '=' ,'valor' => $data->email]]);

    // Verifica se há exatamente um utilizador com o e-mail fornecido
    if (count($resultados) !== 1) {
        echo json_encode(["message" => "Não existe nenhum utilizador com este e-mail"]);
        http_response_code(401);
        exit;
    }

    $utilizador = $resultados[0];

    // Verifica se o utilizador está ativo
    if ($utilizador->getAtivo() == 1) {
        // Verifica a correspondência da senha
        if (password_verify($data->password, $utilizador->getPassword())) {
            //header do token, aqui é definido o algoritimo de encriptação e o tipo
            $header = [
                'alg' => 'HS256',
                'typ' => 'JWT'
            ];

            //passa o header para objeto json e encriptar para base_64
            $header = base64_encode(json_encode($header));

            //toda a informação necessaria sobre o cliente fica no payload
            $payload = [
                'id_utilizador' => $utilizador->getId(),
                'perfil' => $utilizador->getPerfil(),
                'ativo' => $utilizador->getAtivo()
            ];

            //passa o payload para objeto json e encriptar para base_64
            $payload = base64_encode(json_encode($payload));

            //chave para encriptar e desincriptar o token
            $chave = "aSjnJNKu883K092kk)(MKJNjka90#";

            //assinatura para o token
            $assinatura = hash_hmac('sha256', "$header.$payload", $chave, true);

            //assinatura convertida em base 64
            $assinatura = base64_encode($assinatura);

            //cria-se o token juntado o header, o payload e a assinatura
            $token = "$header.$payload.$assinatura";

            echo json_encode(["token" => $token]);
            http_response_code(200);
            exit;
        } else {
            echo json_encode(["message" => "Credenciais inválidas"]);
            http_response_code(401);
            exit;
        }
    } else {
        echo json_encode(["message" => "Utilizador inativo. Contacte o suporte."]);
        http_response_code(401);
        exit;
    }
} else {
    // Se o método da solicitação não for POST
    echo json_encode(["message" => "Método não permitido"]);
    http_response_code(405);
    exit;
}
