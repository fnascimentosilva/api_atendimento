<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {


    //capturando o body da requisicao
    $body = json_decode(file_get_contents("php://input"));


    $guiche = filter_var($body -> guiche, FILTER_VALIDATE_INT);

    if (!$guiche ) {
        echo json_encode(['error' => 'Selecione o numero do guiche!']);
    }



    $fila = json_decode(file_get_contents('filaAtendimento.txt'));

    //pega o primeiro item do array
    //excluir a pessoa do array de fila

    //identificar qual o guiche de atendimento
    //fazer um push do item retirado do array de fila

    if($type === 1){
    array_push($filaAtendimento, ['nome' => $nome, 'cpf' => $cpf]);
}else{
    //coloca os dados inicio do array
    array_unshift($filaAtendimento, ['nome' => $nome, 'cpf' => $cpf]);
}
    file_put_contents('filaAtendimento.txt', json_encode($filaAtendimento));

    http_response_code(201);
    echo json_encode([
        'message' => 'Aguarde sua vez!'
    ]);
}
