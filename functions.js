//pega todas os produtos
function getAllProducts() {


    var request, data;

    request = verificaRequest();
    container = document.getElementById('dados');
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {

            // /data = JSON.parse(request.responseText);
            data = $.parseJSON(request.responseText);
            table = "";

            for (var i in data) {
                table += "<tr>";
                table += "<td>" + data[i]['id'] + "</td>";
                table += "<td>" + data[i]['name'] + "</td>";
                table += "<td>" + data[i]['description'] + "</td>";
                table += "<td>" + data[i]['price'] + "</td>";
                table += "<td>" + data[i]['category_name'] + "</td>";

                table += "<td><a class='btn btn-default btn-sm' href='update.php?id=" + data[i]['id'] + "'><span class='glyphicon glyphicon-pencil'></span></a>&nbsp;<button class='btn btn-default btn-sm' onclick='javascript:deleteProduct(" + data[i]['id'] + ")'><span class='glyphicon glyphicon-remove'></span></button></td>";
                table += "</tr>";
            }
            container.innerHTML = table;
        }
    };
    request.open("GET", "product/read.php", true);
    request.send();

}

//pega um produto
function getOneProduct(id) {
    $.ajax({
        type: "GET",
        url: "product/read_one.php?id=" + id,
        dataType: "json",
        success: function (retorno) {
            console.log(retorno);
            nameProduct = document.getElementById('name').value = retorno['name'];
            priceProduct = document.getElementById('price').value = retorno['price'];
            descriptionProduct = document.getElementById('description').value = retorno['description'];
            $("#category_id").each( function(index, value) {
                if(index === id){
                    value[index].attr('seleted',true);
                }
            });
            category_idProduct = document.getElementById('category_id').value = retorno['category_id'];
        }
    });

}

//insere produto
function postProduct() {
    nameProduct = document.getElementById('name').value;
    priceProduct = document.getElementById('price').value;
    descriptionProduct = document.getElementById('description').value;
    category_idProduct = document.getElementById('category_id').value;
    createdProduct = document.getElementById('created').value;
    $.ajax({
        type: "POST",
        url: "product/create.php",
        dataType: "json",
        data: JSON.stringify({
            "name": nameProduct,
            "price": priceProduct,
            "description": descriptionProduct,
            "category_id": category_idProduct,
            "created": createdProduct
        }),
        success: function (retorno) {
            console.log(retorno);
            document.getElementById('alert').style.display = 'block';
            setTimeout(function () {
                window.location = '/';
            },1500);
        }
    });
}

//deleta produto
function deleteProduct(id) {
    $.ajax({
        type: "DELETE",
        url: "product/delete.php?id=" + id,
        success: function (retorno) {
            alert(retorno['message']);
            getAllProducts();
        }
    });
}

//atualiza produto
function putProduct(id) {
    nameProduct = document.getElementById('name').value;
    priceProduct = document.getElementById('price').value;
    descriptionProduct = document.getElementById('description').value;
    category_idProduct = document.getElementById('category_id').value;
    createdProduct = document.getElementById('created').value;
    $.ajax({
        type: "PUT",
        url: "product/update.php?id=" + id,
        data: JSON.stringify({
            "name": nameProduct,
            "price": priceProduct,
            "description": descriptionProduct,
            "category_id": category_idProduct,
            "created": createdProduct
        }),
        success: function (retorno) {
            console.log(retorno);
            document.getElementById('alertUpdate').style.display = 'block';
            setTimeout(function () {
                window.location = '/';
            },1500);
        }
    });
}

//pega todas as categorias
function getAllCategory(id) {


    var request, data;

    request = verificaRequest();
    container = document.getElementById('category_id');
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {

            // /data = JSON.parse(request.responseText);
            data = $.parseJSON(request.responseText);
            option = "";

            for (var i in data) {
                option += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
            }
            container.innerHTML = option;
        }
    };
    request.open("GET", "category/read.php", true);
    request.send();

}

//verifica requisição
function verificaRequest() {
    return req = (window.XMLHttpRequest) ? new XMLHttpRequest() :
        new ActiveXObject('Microsoft.XMLHTTP');
}

