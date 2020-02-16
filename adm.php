
<?php 

include 'init.php';
include 'connect.php';

if (!empty($_SESSION['name'])) {
  $smt = $con -> prepare("SELECT USR_ID FROM USERS WHERE USR_NAME = ?");
  $smt -> bindParam(1,$_SESSION['name']);
  $smt -> execute();
  $resul = $smt -> fetch();
}
  $id = $resul['USR_ID'];
  $sm = $con-> prepare("SELECT USR_NAME,USR_EMAIL,USR_PASSWORD FROM USERS"); 
  $sm -> bindParam(1,$id);
  $sm -> execute();
  $dados = $sm-> fetchall();
  //var_dump($pizza);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>Adm</title>
    <link rel="stylesheet" type="text/css" href="css/adm.css"/>  
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Pacifico&display=swap" rel="stylesheet">
 
</head>
<body>
<div class="app">
<header class="menu" >
     
     <a href="#" >You thoughts</a>
        <nav>
                <li><a href="index.php" >Inicio</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#"><?= $_SESSION['nome'] ?></a></li>
             <li><a href="index.php">Sair</a></li>
        </nav>
        
        </header>

<section class="principal">



<table>
 		<thead>
 			<tr>
 				<th>Nome</th>
 				<th>Email</th>
 				<th>Senha</th>
 					<th>Excluir</th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php foreach ($dados as $value): ?>
 			<tr>	
 				<td><?= $value[0] ?></td>
 				<td><?= $value[1] ?></td>
 				<td><?= $value[2] ?></td>
	 					<td><a href="remove.php?rm=<?=$value[0]?>"  id="apagar"> Excluir</a></td>
 			</tr>
 			<?php endforeach ?>
		</tbody>
 	</table>






</section>


<section class="fim">
<h1 id="footmsg">mgbs@distribuição ltda</h1>

</section>



<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>

</script>
</body>
</html>