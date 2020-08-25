<?php
// Iniciar Sessão
session_start();
 
// Desative todas as variáveis da Sessão
$_SESSION = array();
 
//Destrói os dados registrados da sessão. Desloga
session_destroy();
 
// Redireciona para a pagina login
header("location: login.php");
exit;
?>