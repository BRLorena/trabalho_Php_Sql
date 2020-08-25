<?php

require_once "../BD/bd.php";
// variáveis inicializadas com valores vazios
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    //Iserir usuário
    if(empty(trim($_POST["username"]))){ //$_POST: Um Array associativo de variáveis ​​transmitidas ao script atual por meio do método HTTP POST.
        $username_err = "Insira o username.";
    } else{
     
        $sql = "SELECT username FROM  users  WHERE username = :username";
        
        if($stmt = $conn->prepare($sql)){ // Prepara uma declaração SQL para execução

            //Vincula um parâmetro a variável inserida na base de dados (username).
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            $param_username = trim($_POST["username"]);
            
            // Executar o usuario
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Este nome de usuário esta em uso";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Tente novamente mais tarde.";
            }

            unset($stmt);
        }
    }
    
    // Validar password
    if(empty(trim($_POST["password"]))){
        $password_err = "Insira sua password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar e confirmar password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirme sua Password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A senha não está correcta.";
        }
    }
    
    // verificar erros de Input's na Base de dados
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Preparar Insert
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
         
        if($stmt = $conn->prepare($sql)){
            // Vincular variáveis
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR); // Vincula um parâmetro a variável inserida na base de dados (username).
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR); // aqui acontece a mesma coisa que acima. (password)
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash (Senha forte.)
            
            // Tentativa de executar o stmt.
            if($stmt->execute()){

                // Redireciona para login.php
                header("location: login.php");
            } else{
                echo "Algo deu errado.Tente novamente.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="shortcut icon" href="../img/market.png" type="image/x-icon">
        <link rel="stylesheet" href="../style/styleLogin.css">
    <body>
        <div class="wrapper">
            <h2>Registro</h2> 
            <p>Insira seus dados para criar uma conta</p> <br> <!--htmlspecialchars: Converte caracteres especiais em HTML-->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" > 
            <!-- ($_SERVER["PHP_SELF"]): é o caminho para o próprio arquivo. Desta forma, ao submeter o formulário, a requisição POST será enviada para ela mesmo. -->
            
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input  type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-default" value="Reset">
                </div>
                <p>Ja possui uma conta? <a href="login.php">Login aqui</a>.</p>
            </form>
        </div>    
    </body>
</html>