<?php

// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: GET");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// header("Access-Control-Allow-Origin: http://localhost:3000");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
// header("Access-Control-Allow-Headers: Content-Type");


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include "../inc/dbcon.php";
include "function.php";


$resquestMethod = $_SERVER["REQUEST_METHOD"];

if($resquestMethod == "GET")
{

    if(isset($_GET['id']))
    {
        $customer = getCustomer($_GET);
        echo $customer;
    }

    else{
        $customerList = getCustomerList();
        echo $customerList;    
    }


}
else{

    $data = [
        'status' => 405,
        'message' => $resquestMethod. 'Method Not Allowed'
    ];
    header("HTTP/1.0 405 Method Not Allowed");
    echo json_encode($data);
}
 
?>