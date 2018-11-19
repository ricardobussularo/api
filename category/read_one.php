<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// inclui database e objeto
include_once '../config/database.php';
include_once '../objects/category.php';

// pega coneção
$database = new Database();
$db = $database->getConnection();

// prepara objeto
$category = new Category($db);

// seta id como propriedades para ler
$category->id = isset($_GET['id']) ? $_GET['id'] : die();

// le detalhe do produtos
$category->readOne();

if($category->name!=null){
    // cria array
    $category_arr = array(
        "id" =>  $category->id,
        "name" => $category->name,
        "description" => $category->description

    );

    // seta resposta status codigo 200 ok
    http_response_code(200);

    // transforma array em json
    echo json_encode($category_arr);
}

else{
    // seta resposta status codigo 404 pagina não encontrada
    http_response_code(404);

    // categoria não existe
    echo json_encode(array("message" => "Categoria não existe"));
}
?>