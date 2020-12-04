<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aba Cadastro</title>
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
</head>
<body>
    <div align="center">
   
        <div id="cadastro">
            <form method="POST">
                <div id="borda"> <h1 id="texto"> Tela de Cadastro</h1></div>
                <img src="logo.png" width="300px" height="125px"><br>
                <input type="text" placeholder="Digite o seu nome" name="nome"maxlength="30"><br>
                <input type="email" placeholder="Digite seu email" name="email"maxlength="30"><br>
                <input type="email" placeholder="Confirme seu Email" name="conf_email"maxlength="30"><br>
                <input type="password" placeholder="Senha" name="senha"maxlength="20"><br>
                <input type="password" placeholder="Confirme sua Senha" name="conf_senha"maxlength="20"><br>
                <button type="submit">Cadastrar</button>
                <button type="reset">Apagar</button><br>
                <a href="login.php">Já tem um Cadastro? Clique aqui para fazer o Login</a>

            </form>
        </div>

    </div>
<?php

  $pdo = new PDO('mysql:host=localhost;dbname=clientes', 'root', '');

if (getenv("REQUEST_METHOD") == "POST")
{   
    global $pdo;

    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $conf_email=$_POST['conf_email'];
    $senha=$_POST['senha'];
    $conf_senha=$_POST['conf_senha'];
    
    
    if($email==$conf_email && $senha==$conf_senha)
    { 
      $sql=("SELECT id_usuario FROM usuario WHERE email=:e");
      $stmt=$pdo->prepare($sql);
      $stmt->bindParam(':e',$email);
        if($stmt->rowCount() >0)
        {
            echo "Conta ja existente";

        }
        else
        {
            $sql="INSERT INTO usuario (nome,email,senha)VALUES(:n,:e,:s)";
            $stmt=$pdo->prepare($sql);
            $stmt->bindParam(':n',$nome);
            $stmt->bindParam(':e',$email);
            $stmt->bindParam(':s',$senha);
            $result=$stmt->execute();
            if( !$result )
            {
                echo "erro";
            }
            else
            {
             
            
               echo $stmt->rowCount() . "linhas inseridas";
               header("location:login.php");
         
            }
         
           
 


        }

        
    }else
    {
        echo " Senha ou Email nao conferem";
    }
} 

?>

</body>
</html>