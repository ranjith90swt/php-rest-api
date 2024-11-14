<?php
error_reporting(0);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

include "function.php";
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Handle preflight requests
    http_response_code(200);
    exit();
}
$resquestMethod = $_SERVER["REQUEST_METHOD"];

if($resquestMethod == "POST")
{

    $inputData = json_decode(file_get_contents("php://input"), true);
    if(empty($inputData)){

        $saveCustomer = saveCustomer($_POST);
    }
    else{
        $saveCustomer = saveCustomer($inputData);
    }

    echo $saveCustomer;
}

else{
    $data = [
        'status' => 405,
        'message' => $resquestMethod. ' Method Not Allowed',

    ];

    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}
?>