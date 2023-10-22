<?php 

function getBody(){
    return json_decode(file_get_contents("php://input"));
}


function readFileContent($file){
    return json_decode(file_get_contents($file));
}
?>