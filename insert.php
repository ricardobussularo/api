<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="plugins/css/bootstrap.css">
    <script src="plugins/js/jquery.js"></script>
    <script src="plugins/js/bootstrap.js"></script>
    <title>Produtos</title>
</head>
<body>

<?php include 'menu.php'; ?>
<div class="container">
    <form id="addFormProduct">

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="price">Preço</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Preço">
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label for="description">Categoria</label>
            <select name="category_id" id="category_id" class="form-control">
            </select>
        </div>
        <input type="hidden" name="created" id="created" value="<?=date('Y-m-d H:i:s')?>">

        <div class="form-group">
            <button type="button" class="btn btn-primary" onclick="javascript:postProduct();">Enviar</button>
        </div>
        <div class="alert-success" id="alert" style="display: none">Producto criado com sucesso</div>
    </form>
</div>
<script src="functions.js"></script>
<script !src="">
    getAllCategory();
</script>
</body>
</html>