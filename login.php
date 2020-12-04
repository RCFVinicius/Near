<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
</head>
<body>
    <div align="center">

        <div id="cadastro">

            <form method="POST">
             <div id="borda"> <h1 id="texto"> Tela de Login</h1></div>
                <img src="logo.png" width="300px" height="125px"><br>
                <input type="email" placeholder="Digite seu email" name="email"><br>
                <input type="password" placeholder="Senha" name="senha"><br>
                <button type="submit">Entrar</button>
                <button type="reset">Apagar</button><br>
                <a href="cadastro.php">Não tem uma conta ainda? Clique aqui para se Cadastrar</a>   
            </form>
    
        </div>

    </div>
    <?php
  if (getenv("REQUEST_METHOD") == "POST") 
  {
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    echo $email,"/////////",$senha;
    $pdo = new PDO('mysql:host=localhost;dbname=clientes', 'root', '');
    $sql="SELECT id_usuario FROM usuario WHERE email= :e AND senha=:s";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':e',$email);
    $stmt->bindParam(':s',$senha);
    $result=$stmt->execute();
    if($stmt->rowCount()>0)
        {
              //areaprivada(sessao)
            $dado=$stmt->fetch();
            session_start();
            $_SESSION['id_usuario']=$dado['id_usuario'];

            header("location:aba_privada.html");
            //logado com sucesso

        }else
        {
            echo "erro";
        }
   
    

   
    

  }


 ?>   
</body>
</html>