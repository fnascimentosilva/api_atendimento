<?php
//importacao do arquivo
require_once 'config.php';
require_once 'utils.php';

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {


    //capturando o body da requisicao
    $body = getBody();



    $nome = filter_var($body->nome, FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_var($body->cpf, FILTER_SANITIZE_SPECIAL_CHARS);
    $type = filter_var($body->type, FILTER_VALIDATE_INT);

    if (!$nome || !$cpf || !$type) {
        echo json_encode(['error' => 'faltam informacoes para o atendimento']);
    }



    $filaAtendimento = readFileContent(ARQUIVO_FILA_ATENDIMENTO);

    if ($type === 1) {
        array_push($filaAtendimento, ['nome' => $nome, 'cpf' => $cpf]);
    } else {
        //coloca os dados inicio do array
        array_unshift($filaAtendimento, ['nome' => $nome, 'cpf' => $cpf]);
    }
    file_put_contents(ARQUIVO_FILA_ATENDIMENTO, json_encode($filaAtendimento));

    http_response_code(201);
    echo json_encode([
        'message' => 'Aguarde sua vez!'
    ]);
}
