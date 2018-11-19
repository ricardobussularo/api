<?php
// requisição headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

// inclui arquivos de bd e modal
    include_once '../config/database.php';
    include_once '../objects/product.php';

// pega conexao
    $database = new Database();
    $db = $database->getConnection();

// objeto do produto
    $product = new Product($db);

// query de produtos
    $stmt = $product->read();
    $num = $stmt->rowCount();


    if($num>0){

        // cria array
        $products_arr=array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $product_item=array(
                "id" => $id,
                "name" => $name,
                "description" => html_entity_decode($description),
                "price" => $price,
                "category_id" => $category_id,
                "category_name" => $category_name
            );

            array_push($products_arr, $product_item);
        }


        http_response_code(200);


        echo json_encode($products_arr);
    }

    else{


        http_response_code(404);


        echo json_encode(
            array("message" => "Produtos não encontrados.")
        );
    }
?>