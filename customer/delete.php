<?php
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: DELETE, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Handle preflight requests
    http_response_code(200);
    exit();
}

include "function.php";

$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod == "DELETE")
{
    $deleteCustomer = deleteCustomer($_GET);
    echo  $deleteCustomer;


}
else{

    $data = [
        'status' => 405,
        'message' => 'Method Not Allowed'
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}


?>