<?php
// Inicialize Sesão
session_start();
 
// Verifique se o usuário está logado, caso contrário, redirecione para a página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}
 
// Include config file
require_once "../BD/bd.php";
 
//Variáveis ​​inicializão com valores vazios
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processa os dados quando o formulário é submetido. "POST"
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  // Validar a nova password
  if(empty(trim($_POST["new_password"]))){
    $new_password_err = "Por favor Insira sua password.";     
  } 
  elseif(strlen(trim($_POST["new_password"])) < 6){
    $new_password_err = "A senha deve ter pelo menos 6 caracteres.";
  } 
  else{
    $new_password = trim($_POST["new_password"]);
  }
    
  // Validar e confirmar a password
  if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Por favor confirme sua password.";
  } 
  else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($new_password_err) && ($new_password != $confirm_password)){
      $confirm_password_err = "A senha não corresponde.";
    }
  }
        
  // Verifica os erros de Input's antes de atualizar a base de dados
  if(empty($new_password_err) && empty($confirm_password_err)){
    // Prepara um UPDATE
    $sql = "UPDATE users SET password = :password WHERE id = :id";
        
    if($stmt = $conn->prepare($sql)){
      // Vincular variáveis a pass e id
      $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
      $stmt->bindParam(":id", $param_id, PDO::PARAM_INT);
            
      //Definir parâmetros
      $param_password = password_hash($new_password, PASSWORD_DEFAULT);
      $param_id = $_SESSION["id"];
            
      //Tentativa para executar a variável $stmt.
      if($stmt->execute()){

        // Senha atualizada com sucesso. Destrua os dados da sessão e redirecione para a página de login
        session_destroy();
        header("location: login.php");
        exit();
      }
      else{
        echo "Oops! Algo deu errado, tente novamente.";
      }
      
      unset($stmt);
    }
  }
    
  
  unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../style/styleRedefine.css"> 
    <link rel="shortcut icon" href="../img/market.png" type="image/x-icon">
  </head>
  <body>  
    <div class="wrapper">
      <h2>Redefina sua Password</h2>
      <p> Preencha este formulário para redefinir sua senha.</p><br>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
          <label>New Password</label>
          <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
          <span class="help-block"><?php echo $new_password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
          <label>Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control">
          <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit">
          <a class="btn btn-primary" class="btn btn-link" href="lista.php">Cancel</a>
        </div>
      </form>
    </div>    
  </body>
</html>