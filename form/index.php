<?php


$request = $_GET['request'] ?? '';
$segments = explode('/', trim($request, '/'));

if (count($segments) > 0) {
    $resource = $segments[0];
    
    switch ($resource) {
        case 'forms':
            require 'create.php';
            break;
        case 'products':
            require 'api/products.php';
            break;
        default:
            http_response_code(404);
            echo json_encode(['message' => 'Resource not found']);
            break;
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Bad request']);
}
