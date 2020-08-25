<?php 

include ('bd.php'); 

try{      

    $codProduto = $_POST['codProduto'];
    
    $stmt = $conn->prepare("UPDATE produto SET
    nome=:nome, marca=:marca, preco=:preco, departamento=:departamento
    WHERE codProduto=:codProduto");
    $stmt->bindParam(':codProduto', $codProduto);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':departamento', $departamento);

    $codProduto=$_POST['codProduto']; 
    $nome=$_POST['nome'];     
    $preco=$_POST['preco'];
    $marca=$_POST['marca']; 
    $departamento=$_POST['departamento']; 
    $stmt->execute();

    echo "Produto alterado com sucesso!<br>"; 

}catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

echo "<a href=\"../lista.php\">Voltar à lista de produtos</a></button>";

include ('fecharLigação.php')
?>