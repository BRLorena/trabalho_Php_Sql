<?php 

$servername = "localhost"; 
$username = "Bruno";
$password = "bruno"; 

try {     
    $conn = new PDO("mysql:host=$servername;dbname=pratico", $username, $password);       
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    //echo "Ligação OK<br>";     
}
catch(PDOException $e)    {     
    echo "Ligação falhou: " . $e->getMessage();     
    }
    
?>  