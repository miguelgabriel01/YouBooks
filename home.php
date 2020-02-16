<?php 

include 'init.php';
include 'connect.php';

if (!empty($_SESSION['nome'])) {
  $smt = $con -> prepare("SELECT USR_ID FROM USERS WHERE USR_NAME = ?");
  $smt -> bindParam(1,$_SESSION['nome']);
  $smt -> execute();
  $resul = $smt -> fetch();
}
  $id = $resul['USR_ID'];
  $sm = $con-> prepare("SELECT LV_ID,LV_NOME,LV_GENERO,LV_ESCRITOR,LV_ANO,USR_ID FROM LIVROS"); 
  $sm -> bindParam(1,$id);
  $sm -> execute();
  $dados = $sm-> fetchall();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.2">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/home.css"/>  
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Pacifico&display=swap" rel="stylesheet">
 
</head>
<body>
<div class="app">
<header class="menu" >
     
     <a href="#" >You books</a>
        <nav>
                <li><a href="logout.php" >Inicio</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#"><?= $_SESSION['nome'] ?></a></li>
             <li><a href="logout.php">Sair</a></li>
        </nav>
        
        </header>
<section class="principal-form"> 


<div class="principal">
                     <h2>Cadastrar livros </h2>
              
                <form id="login" action="cadastrarLivros.php" method="POST">
          
                <div class="meio">
                      <input class="ipt" type="text" name="nomelivro" placeholder="Nome do livro" >
                      <label>Nome</label>
                  </div> 

                

                    <div class="meio">
                        <input class="ipt" type="text" name="genero" placeholder="Genêro" >
                        <label>Genêro</label>
                     </div> 
              
          
                    <div class="meio">
                        <input class="ipt" type="text" name="escritor" placeholder="Escritor">
                        <label>Escritor</label>
                    </div>    

                    <div class="meio">
                        <input class="ipt" type="number" name="ano" placeholder="Ano de lançamento">
                        <label>Ano de lançamento</label>
                    </div>  
                   
                     <input type="submit" name="" value="Salvar">
                  </form>
                 </div>
        
</section>
<section class="cadastrados">

<h1 id="tituloCadastrados">Livros cadastrados</h1>

<table>
 		<thead>
 			<tr>
 				<th>Nome</th>
 				<th>Genêro</th>
 				<th>Escritor</th>
 				<th>Ano</th>
                 <?php if(logado()): ?>
 					<th>Editar</th>
                 <?php endif ?>
            </tr>
 		</thead>
 		<tbody>
             <!--testar condição!-->
            
 			<?php foreach ($dados as $value): ?>
 			<tr>	
 				<td><?= $value[1] ?></td>
 				<td><?= $value[2] ?></td>
 				<td><?= $value[3] ?></td>
 				<td><?= $value[4] ?></td>

                 <?php if($value['USR_ID'] == $resul['USR_ID'] ): ?>
	 				<?php if(logado()): ?>
	 					<td><a id="apagar" href="removerLivro.php?rm=<?=$value[0]?>"> Excluir</a></td>
	 				<?php endif ?>
                 <?php endif ?>
            </tr>
 			<?php endforeach ?>


        </tbody>
 	</table>


<!--

 	<table>
 		<thead>
 			<tr>
 				<th>Nome Pizza</th>
 				<th>Ingredientes 1</th>
 				<th>Ingredientes 2</th>
 				<th>Ingredientes 3</th>
 				<th>Ingredientes 4</th>
 				<?php if(logado()): ?>
 					<th>Excluir</th>
 				<?php endif ?>
 			</tr>
 		</thead>
 		<tbody>
 			<?php foreach ($pizza as $value): ?>
 			<tr>	
 				<td><?= $value[1] ?></td>
 				<td><?= $value[2] ?></td>
 				<td><?= $value[3] ?></td>
 				<td><?= $value[4] ?></td>
 				<td><?= $value[5] ?></td>
 				<?php if($value['USR_ID'] == $resul['USR_ID'] ): ?>
	 				<?php if(logado()): ?>
	 					<td><a href="remove.php?rm=<?=$value[0]?>"> Excluir</a></td>
	 				<?php endif ?>
 				<?php endif ?>
 			</tr>
 			<?php endforeach ?>
		</tbody>
 	</table>


!-->


</section>

<section class="fim">
<a id="footmsg" href="https://github.com/miguelgabriel01">mgbs@distribuição ltda</a>

</section>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>

new Vue({
    el:"",
    data: {
        show:false
    }

    
})





</script>
</body>
</html>