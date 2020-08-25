<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir</title>
</head>
<?php include('header.php') ?>

<body>
    <div class="container-fluid text-center p-3">
        <form action="BD/insert.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome do Produto</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Preço do Produto</label>
                    <input type="text" name="preco" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Marca</label>
                    <input type="text" name="marca" class="form-control" placeholder="Italac">
                </div>
                <div class="form-group col-md-6">
                    <label>Departamento</label>
                    <input type="text" name="departamento" class="form-control" placeholder="Bebidas">
                </div>
            </div><br>
            <div class="container text-center">
                <input type="submit" value="Inserir" class="btn btn-success">
            </div>
        </form>
    </div>
</body><br><br><br>
<?php include('footer.php') ?>