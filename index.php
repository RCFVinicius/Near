<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    
</head>

<body>     
    <div id="menu" align="center">
              
      <div id="cliente">
        <a href="cadastro.php"> <img src="conta.png" width="70px"></a>
      </div>
                    
      <div id="logo">
        <img src="logo.png" width="150px">
      </div>      
      
    </div>


    <section class="galeria">
      <img class="foto" src="coxinha_no_pote.jpg"  width="1200px" height="300px">
      <img class="foto" src="caixa-certa-do-bombom.jpg" width="1200px" height="300px">
      <img class="foto" src="telefone.jpg" width="1200px" height="300px" >
      <img class="foto" src="pote_de_geleia.png" width="1200px" height="300px" >
    </section><br>
<?php



$pdo = new PDO('mysql:host=localhost;dbname=clientes', 'root', '');
$consulta="SELECT* FROM produto";
$con=$pdo->query($consulta);
?>

<div id="postgem" >

<tr>

<?php while($dado=$con->fetch()){  ?>

  <center>
  <td> <img src="<?php  echo $dado['imagem']?>" width="200px" height="180px"> </td>
<td id="pri"><h4> NOME DO PRODUTO:<?php  echo $dado['nome']?></h4>  </td>
<td> <h4> TELEFONE:<?php  echo $dado['telefone']?></h4>  </td>
<td><h4> EMAIL: <?php  echo $dado['email']?></h4> </td>
<td> <h4> DESCRIÇÃO:<?php  echo $dado['descricao']?><h4> <td>
</center>

</tr>

</div>
<?php  }?>


</body>
</html>