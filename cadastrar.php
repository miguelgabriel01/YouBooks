<?php 

include "connect.php";
include "init.php";

//aqui são criadas variaveis para amarzenar os dados vindo form de cadastro de usuario
$name = $_POST['nome']?? "";//recebe o nome do usuario
$email = $_POST['email']?? "";//recebe o email do usuario
$pw = $_POST['senha']?? "";//recebe a senha do usuario
$pw2 = $_POST['senha2']?? "";//recebe a mesma senha para fazer a confirmação que as senhas são iguais


//aqui são testada a condição das senhas serem diferentes. se isso for verdadeiro o usuario sera redirecionado a pagina de cadastro 
if($pw != $pw2){//verifica se senha é igual a senha2
	redirect('index.php?msg=As senhas nao podem ser diferentes');//se o resultado for verdadeiro, redireciona para a paginma de4 cadastro

}

//aqui verifica se os campo estçao vazios. coisa que se o desenvolvedor colocar um required no form, impossiblilitarar de dados vazios chegarem a essa pagina
if($name == "" || $email == ""){
	redirect('index.php?msg=Campos Vazios');//caso os dados estejam vazios, o usuaro sera levado a pagina de cadastro

}
else{//caso contrario
	try {
		
		$smt = $con -> prepare("INSERT INTO USERS(USR_NAME,USR_EMAIL,USR_PASSWORD) VALUES (?,?,?)");
		$smt -> bindParam(1,$name);//nome no indice 1
		$smt -> bindParam(2,$email);//email no indice 2
		$smt -> bindParam(3, $pw);//senha no indice 3
		$smt -> execute();//salva os dados

		//os inidices assim como no ARRAY se iniciam no zero. e o inidice zero, corresponde ao id do usuario( que é unico)
		
		redirect('index.php?msg=Usuario Cadastrado');//caso tudo ocorra bem, o usuario ṕe redirecionado para a pagina de login

		//var_dump("nao, nao, entrou foi aqui");
	redirect('index.php');
	} catch (Exception $e) {
		$e -> getMessage();
	}

}

?>