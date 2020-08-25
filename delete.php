<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="shortcut icon" href="img/market.png" type="image/x-icon">
</head>

<?php include('header.php') ?>
<br><br>

<body>
    <div class="text-center">
        <h1>Lista de Produtos</h1>
    </div>
    <br>
    <br>
    <div class="container-fluid text-center p-3">
        <form action="BD/delete.php" method="post">
            <input type="text" name="codProduto" placeholder="Codigo do Produto">
            <button type="submit" class="btn btn-danger">Delete </button>
        </form>
    </div>

    <div class="container">
        <div class="col">
        </div>
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Código Produto</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Departamento</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php include('BD/selectall.php'); ?>
                </tbody>
            </table>
        </div>
        <div class="col">
        </div>
    </div>

</body><br><br>

<?php include('footer.php') ?>

</html>