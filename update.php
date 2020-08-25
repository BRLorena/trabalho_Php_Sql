<?php include('header.php') ?>
<?php include('BD/bd.php'); ?>

<?php
$id = filter_input(INPUT_GET, 'codProduto', FILTER_SANITIZE_NUMBER_INT);

$result_edit = $conn->query("SELECT * FROM produto Where codProduto=$id");
$row_edit = $result_edit->fetch();

?>

<div class="container text-center p-3">
    <form action="BD/update.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>ID:</label>
                <input type="text" name="codProduto" class="form-control" placeholder="Codigo" readonly=“true” value="<?php echo $row_edit['codProduto']; ?>"><br>
            </div>
            <div class="form-group col-md-6">
                <label>Produto:</label>
                <input type="text" name="nome" class="form-control" placeholder="Produto" value="<?php echo $row_edit['nome']; ?>"><br>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Preco:</label>
                <input type="text" name="preco" class="form-control" placeholder="Preco" value="<?php echo $row_edit['preco'] . "€"; ?>">
            </div>
            <div class="form-group col-md-6">
                <label>Marca:</label>
                <input type="text" name="marca" class="form-control" placeholder="Marca" value="<?php echo $row_edit['marca']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label>Departamento:</label>
                <input type="text" name="departamento" class="form-control" placeholder="Departamento" value="<?php echo $row_edit['departamento']; ?>">
            </div>
            <div class="container text-center">
                <input type="submit" class="btn btn-info">
            </div>
    </form>
</div><br>

<?php include('footer.php') ?>