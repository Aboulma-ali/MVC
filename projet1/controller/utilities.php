<?php 

function showArray($array) {
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function drawPage($datas_page){
    // showArray($datas_page);
    extract($datas_page);
    // echo $title;
    
    ob_start();
    require_once($view);
    $content = ob_get_clean();
    require_once($layout);

}

function sendJson_get($datas){
    // tous les sites y ont accés
    header('Access-Control-Allow-Origin:*');
    // On autorise seulement GET et non post, put, patch, delete, head et options
    header('Access-Control-Allow-Methods:GET');
    // on envoie en JSON
    header('Content-Type: application/json');
    echo json_encode($datas);

}