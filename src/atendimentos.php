<?php

require_once 'config.php';

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



    $fila = json_decode(file_get_contents(ARQUIVO_FILA_ATENDIMENTO));

    //pega o primeiro item do array
     //excluir a pessoa do array de fila
    $primeiroCliente = array_shift($fila);

    file_put_contents(ARQUIVO_FILA_ATENDIMENTO, json_encode($fila));

    //identificar qual o guiche de atendimento
    //fazer um push do item retirado do array de fila

    if($guiche === 1){
        $listaGuiche1 = json_decode(file_get_contents('guiche1.txt'));
        array_push($listaGuiche1, $primeiroCliente);
        file_put_contents('guiche1.txt', json_encode($listaGuiche1));
    }else if($guiche === 2){
        $listaGuiche2 = json_decode(file_get_contents('guiche2.txt'));
        array_push($listaGuiche2, $primeiroCliente);
        file_put_contents('guiche2.txt', json_encode($listaGuiche2));
    }else if($guiche === 3){
        $listaGuiche3 = json_decode(file_get_contents('guiche3.txt'));
        array_push($listaGuiche3, $primeiroCliente);
        file_put_contents('guiche3.txt', json_encode($listaGuiche3));
    }

    
}

?>
