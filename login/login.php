<?php
// Inicializar
session_start();

// Verifique se o usuário já está logado, se sim, redirecione-o para a próxima pagina.
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: ../lista.php");
  exit;
}

require_once "../BD/bd.php";

// variáveis ​​inicializadas com valores vazios
$username = $password = "";
$username_err = $password_err = "";

//  Processa os dados do formulário quando é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Verifique se o nome de usuário está vazio
  if (empty(trim($_POST["username"]))) { //trim: Retire o espaço em branco (ou outros caracteres) do início e do fim de uma string.
    $username_err = "Insira um username.";
  } else {
    $username = trim($_POST["username"]);
  }

  // Verifica se a password está vazia
  if (empty(trim($_POST["password"]))) {
    $password_err = "Insira sua password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validação dos dados
  if (empty($username_err) && empty($password_err)) {

    // verfifica o id e username dentro da table users.
    $sql = "SELECT id, username, password FROM users WHERE username = :username";

    if ($stmt = $conn->prepare($sql)) { // Prepara uma declaração SQL para execução

      // Vincular variáveis.
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

      // Definir os parâmetros.  
      $param_username = trim($_POST["username"]);

      // Tentativa de executar stmt. 
      if ($stmt->execute()) {

        // Verifique se o nome de usuário existe, se sim, verifique a senha
        if ($stmt->rowCount() == 1) {
          if ($row = $stmt->fetch()) { // Verifica as próximas linhas da table users. (id, username, password)
            $id = $row["id"];
            $username = $row["username"];
            $hashed_password = $row["password"];

            if (password_verify($password, $hashed_password)) {
              // Se a senha estiver correta, inicie a sessão.
              session_start();

              // Armazenar dados em variáveis ​​da sessão
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              header("location: ../lista.php"); 

            } else {
              $password_err = "A senha inserida não é valida.";
            }
          }
        } else {
          $username_err = "Username inválido.";
        }
      } else {
        echo "Oops! Algo deu errado, tente mais tarde.";
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
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="shortcut icon" href="../img/market.png" type="image/x-icon">
  <link rel="stylesheet" href="../style/styleLogin.css">
</head>

<body>
  <div class="wrapper">
    <h2>Login</h2>
    <p>Por favor, insira seus dados e efetue o login.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        <span class="help-block"><?php echo $username_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        <span class="help-block"><?php echo $password_err; ?></span>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Login">
      </div>
      <p>Não possui uma conta? <a href="registro.php">Crie uma agora! </a>.</p>
    </form>
  </div>
</body>

</html>