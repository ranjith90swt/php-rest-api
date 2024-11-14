<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: application/json');


$host = "localhost";
$username = "root";
$password = "";
$database = "rest-api";

$conn = mysqli_connect($host, $username, $password, $database);


$resquestMethod = $_SERVER["REQUEST_METHOD"];

if($resquestMethod == "GET")
{

    $query = "SELECT * FROM customers";
    $query_run = mysqli_query($conn, $query);


    if($query_run){

       if(mysqli_num_rows($query_run) > 0){


           $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

           $data = [
               'status' => 200,
               'message' => "Customer Record Fetched Successfully",
               'data' => $res
           ];
           header("HTTP/1.0 200 OK");
           echo json_encode($data);


       }

       else{
           $data = [
               'status' => 404,
               'message' => 'No Customer Found'
           ];
           header("HTTP/1.0 404 No Customer Found");
           echo json_encode($data);
       }
    }

    else{
       $data =[
           'status'=> 500,
           'message' => 'Internal Server Error'
       ];
       header("HTTP/1.0 500 Internal Server Error");
       echo json_encode($data);
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