<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <title>Document</title>
</head>
<body>
<center>    
<form method="POST">
        <input type="email" placeholder="Digite seu e-mail"name="email_1"><br>
        <button type="submit">Procurar</button>
        <button type="reset">Cancelar</button>

    </form>
</center>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=clientes', 'root', '');
if (getenv("REQUEST_METHOD") == "POST")
{
    global $pdo;
    $email=$_POST['email_1'];
    $sql="SELECT * FROM produto WHERE email='$email'";
    $con= $pdo->query($sql);
    $stmt=$pdo->prepare($sql);
    $result=$stmt->execute();
    $dado=$con;
    if($email != NULL)
    {
        ?>
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
    <div id="borda"><h1 id="texto" > Modifique seu produto Aqui!!</h1></div>
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
    

    $sql1="SELECT * FROM produto WHERE email='$email' INSERT INTO produto (nome,telefone,email,descricao,imagem)VALUES(:n,:t,:e,:d,:i) ";
    
    if (getenv("REQUEST_METHOD") == "POST") 
 {
    global $pdo;
    global $sql1;
    $nome=$_POST['nome'];
    $telefone=$_POST['telefone'];
    $email1=$_POST['email'];
    $descricao=$_POST['descricao'];
    $foto=$_POST['foto'];
    //$pp->inserir($nome,$telefone,$email,$descricao,$foto);
    

    
   
    
     
    
    $stmt=$pdo->prepare($sql1);
    $stmt->bindParam(':n',$nome);
    $stmt->bindParam(':t',$telefone); 
    $stmt->bindParam(':e',$email1); 
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

 

         
}


}

?>