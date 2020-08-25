<?php 

if(isset($_POST['nome'])){
include ('bd.php'); 
try{      

    $stmt = $conn->prepare("INSERT INTO produto (nome, preco, marca, departamento)
    VALUES (:nome, :preco, :marca, :departamento)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':departamento', $departamento);

    // insert a row
    $nome=$_POST['nome'];     
    $preco=$_POST['preco'];
    $marca=$_POST['marca'];
    $departamento=$_POST['departamento']; 
    $stmt->execute();

    echo "Produto inserido com sucesso!<br>";
?>
<script>
    alert('Produto inserido com sucesso');
    window.location.href="../inserir.php";
</script>
<?php
}catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
echo "<a href=\"projetoBruno&Rafael/lista.php\">Voltar à lista de produtos</a>";


}

include ('fecharLigação.php')
?> 


