<?php
// requisição headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection// inclui arquivos de bd e modal
    include_once '../config/database.php';

// instantiate product object// pega conexao
    include_once '../objects/product.php';
// objeto do produto
    $database = new Database();
    $db = $database->getConnection();

    $product = new Product($db);

// pega valores
    $data = json_decode(file_get_contents("php://input"));


    if(
        !empty($data->name) &&
        !empty($data->price) &&
        !empty($data->description) &&
        !empty($data->category_id)
    ){
        // seta valores
        $product->name = $data->name;
        $product->price = $data->price;
        $product->description = $data->description;
        $product->category_id = $data->category_id;
        $product->created = date('Y-m-d H:i:s');

        // cria produto
        if($product->create()){


            http_response_code(200);

            // tell the user
            echo json_encode(array("status" => "ok"));
        }


        else{


            http_response_code(503);


            echo json_encode(array("message" => "Falta valores"));
        }
    }


    else{


        http_response_code(400);


        echo json_encode(array("message" => "Produto não criado"));
    }
?>