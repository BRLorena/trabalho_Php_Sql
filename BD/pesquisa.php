<?php

include('bd.php');

$pesquisar = $_POST['pesquisar'];

$stmt = $conn->query("SELECT * FROM produto where nome like '%$pesquisar%'");


while ($row = $stmt->fetch()) {

    echo "<tr>";
        echo "<th>".$row['codProduto']. "</th>";
        echo "<td>".$row['nome']. "</td>";
        echo "<td>".$row ['preco']. "</td>";
        echo "<td>".$row ['departamento']. "</td>";   
        ?>
        <td>
            <a href = "../update.php?codProduto=<?php echo $row['codProduto']; ?>"
            class="btn btn-info">Editar</a>
        </td>
        <?php
    echo "</tr>"; 
}

?>

