<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">

    <title>Exclusao</title>
</head>
<body>
<form method="POST">
    <center>
    <input type="text" placeholder="Digite o nome do produto" name="nome_produto"maxlength="30"><br>
    <input type="email" placeholder="Digite o e mail do vnededor" name="email" maxlength="30"><br>
    <button type="submit"> Excluir </button>
    <button type="reset"> Cancelar </button>
    </center>
</form>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=clientes', 'root', '');


if (getenv("REQUEST_METHOD") == "POST")
{
    
    global $pdo;
    $nome_produto=$_POST['nome_produto'];
    $email=$_POST['email'];
    
    echo $email."/";

    $sql="DELETE * FROM  produto  WHERE: email='$email'";
    $con= $pdo->query($sql);
  
    $stmt=$pdo->prepare($sql);
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


?>
</body>
</html>


