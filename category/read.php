<?php
// requisição de headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

// inclui arquivos de config database e modal
    include_once '../config/database.php';
    include_once '../objects/category.php';

// inicializa objeto database
    $database = new Database();
    $db = $database->getConnection();

// inicializa objeto categoria
    $category = new Category($db);

// query categorias
    $stmt = $category->read();
    $num = $stmt->rowCount();


    if($num>0){


        //cria array com todos os dados
        $categories_arr=array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $category_item=array(
                "id" => $id,
                "name" => $name,
                "description" => html_entity_decode($description)
            );

            array_push($categories_arr, $category_item);
        }

        http_response_code(200);

        echo json_encode($categories_arr);
    }

    else{

        http_response_code(404);

        echo json_encode(
            array("message" => "No categories found.")
        );
    }
?>