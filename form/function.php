<?php

include "../inc/dbcon.php";


function error422($message){

    $data = [

        'status' => 422,
        'message' => $message
    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
}


function storeForm($formInput){

    global $conn;

    $name = mysqli_real_escape_string($conn, $formInput['name']);
    $email = mysqli_real_escape_string($conn, $formInput['email']);
    $phone = mysqli_real_escape_string($conn, $formInput['phone']);
    $comments = mysqli_real_escape_string($conn, $formInput['comments']);

    $query = "INSERT INTO forms(name,email,phone,comments) VALUES ('$name','$email','$phone','$comments')";

    $result = mysqli_query($conn, $query);

    if($result){
        $data = [
            'status'=> 201,
            'message'=> 'Submitted Successfuly',
        ];
        echo json_encode($data);
    }
    else{
        $data = [
            'status'=> 500,
            'message'=> 'Internal Server Error',
        ];
        echo json_encode($data);
    }

}

?>