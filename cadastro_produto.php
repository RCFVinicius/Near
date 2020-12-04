<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do Produto</title>
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
</head>  
<body>







    <center>
    <div id="borda"><h1 id="texto" > Tela de Postagem do Produto</h1></div>
    <div class="produto">
        <img src="logo.png" width="300px" height="125px">
        <form method="POST" >
            <input type="text" name="nome" placeholder="Nome do produto"><br>
            <input type="text" name="telefone" placeholder="Coloque seu numero"><br>
            <input type="email" name="email" placeholder="Coloque seu email"><br>
            <input type="text" id="descricao" name="descricao" placeholder="Descreva seu produto"><br>
            <input type="file" name="foto"><br>
            <button type="submit">Publicar</button>
            <button type="reset" >Cancelar</button>
        </form>

    </div>
    </center>
<?php


$pdo = new PDO('mysql:host=localhost;dbname=clientes', 'root', '');

 if (getenv("REQUEST_METHOD") == "POST") 
 {
    global $pdo;
    $nome=$_POST['nome'];
    $telefone=$_POST['telefone'];
    $email=$_POST['email'];
    $descricao=$_POST['descricao'];
    $foto=$_POST['foto'];
    //$pp->inserir($nome,$telefone,$email,$descricao,$foto);
    

    
   
    
     
    
    $sql="INSERT INTO produto (nome,telefone,email,descricao,imagem)VALUES(:n,:t,:e,:d,:i)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':n',$nome);
    $stmt->bindParam(':t',$telefone); 
    $stmt->bindParam(':e',$email); 
    $stmt->bindParam(':d',$descricao); 
    $stmt->bindParam(':i',$foto);

    
     
     
   
   
    $result=$stmt->execute();
    if( !$result )
    {
        echo "erro";
    }
    else
    {
             
            
      echo "linhas inseridas";
      header("location:index.php");
         
    }
         

 }

 


?>
    
</body>
</html>