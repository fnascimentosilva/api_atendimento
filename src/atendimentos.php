<?php

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


    $guiche = filter_var($body -> guiche, FILTER_VALIDATE_INT);

    if (!$guiche ) {
        echo json_encode(['error' => 'Selecione o numero do guiche!']);
    }


    
    $fila = json_decode(file_get_contents(ARQUIVO_FILA_ATENDIMENTO));

    //pega o primeiro item do array
     //excluir a pessoa do array de fila
    $primeiroCliente = array_shift($fila);

    saveFileContent(ARQUIVO_FILA_ATENDIMENTO, $fila);
    //identificar qual o guiche de atendimento
    //fazer um push do item retirado do array de fila

    if($guiche === 1){
        $listaGuiche1 = readFileContent('guiche1.txt');
        array_push($listaGuiche1, $primeiroCliente);
        saveFileContent('guiche1.txt', $listaGuiche1);
        
    }else if($guiche === 2){
        $listaGuiche2 = readFileContent('guiche2.txt');
        array_push($listaGuiche2, $primeiroCliente);
        saveFileContent('guiche2.txt', $listaGuiche2);
    }else if($guiche === 3){
        $listaGuiche3 = readFileContent('guiche3.txt');
        array_push($listaGuiche3, $primeiroCliente);
        saveFileContent('guiche3.txt', $listaGuiche3);
    }

    
}

?>
