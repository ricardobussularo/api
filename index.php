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
<?php include 'menu.php';?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody id="dados">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="functions.js"></script>
<script !src="">
    getAllProducts();
</script>
</body>
</html>