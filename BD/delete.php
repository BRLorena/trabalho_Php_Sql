<?php 

include ('bd.php'); 

//Eliminar registro
try{      
    $codProduto=$_POST['codProduto'];  

    $stmt = $conn->prepare("DELETE FROM produto WHERE codProduto=:codProduto");
    $stmt->bindParam(':codProduto', $codProduto);
    $stmt->execute();

    echo "Produto eliminado com sucesso!<br>"; 
?>
<script>
    alert('Produto deletado com sucesso');
    window.location.href="../delete.php";
</script>
<?php

}catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

include ('fecharLigação.php')
?>  