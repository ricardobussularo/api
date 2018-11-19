<?php
// requisição headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// inclui arquivos de bd e modal
    include_once '../config/database.php';
    include_once '../objects/product.php';

// pega conexao
    $database = new Database();
    $db = $database->getConnection();

// objeto do produto
    $product = new Product($db);

// pega valores
    $data = json_decode(file_get_contents("php://input"));

// pega id do produto a atualizar
    $product->id = $_GET['id'];

// seta valores
    $product->name = $data->name;
    $product->price = $data->price;
    $product->description = $data->description;
    $product->category_id = $data->category_id;

// atualiza produto
    if($product->update()){

        http_response_code(200);

        echo json_encode(array("message" => "Produto atualizado."));
    }

    else{

        http_response_code(503);

        echo json_encode(array("message" => "Produto não atualizado."));
    }
?>