<?php
//Iniciar Sessão
session_start();

// Verifique se o usuário está logado, caso contrário, redirecione-o para a página de login
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <title>Lista de Produtos</title>
</head>

<?php include('header.php') ?>

<body>
    <br>

    <div class="text-center">
        <form action="dadosProduto.php" method="post">
            <input type="text" name="pesquisar" placeholder="Produto" />
            <input type="submit" value="Buscar" class="btn btn-warning">
        </form>
    </div>
    <br>

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

    <div class="text-center">
        <a href="formInserir.php">Inserir novo produto</a>
        <hr>
    </div>

    <?php include('footer.php') ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
</body>

</html>