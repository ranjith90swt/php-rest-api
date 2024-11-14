<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "function.php" ;

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
    http_response_code(200);
    exit();
}

$requestMethod = $_SERVER['REQUEST_METHOD'] ;

if($requestMethod == 'POST'){
    $inputData = json_decode(file_get_contents("php:\\inputs"), true) ;

    if(empty($inputData)){
        $storeForm = storeForm($_POST);

    }
    else {
        $storeForm = storeForm($inputData);
    }
}

else {
    $data = [
        'status'=> 405,
        'message' => $requestMethod. 'Method Not Allowed',
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}

?>