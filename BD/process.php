<?php

include ('bd.php');

if(isset($_GET['delete'])){
    $codProduto = $_GET ['delete'];
    $stmt = $conn->prepare("DELETE FROM produto WHERE codProduto= $codProduto");

}