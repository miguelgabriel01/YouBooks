<?php 
	
include 'connect.php';
include 'init.php';


$email = $_POST['email']?? "";
$pw = $_POST['senha']?? "";

if($email == "" || $pw == ""){
	redirect('index.php?msg=campos vazios');
	//exit();
}

$smt = $con -> prepare("SELECT USR_NAME,USR_EMAIL FROM USERS WHERE USR_EMAIL = ? AND USR_PASSWORD = ?");
$smt -> bindParam(1,$email);
$smt -> bindParam(2, $pw);
$smt -> execute();
$resul = $smt -> fetch();

if (!empty($resul)) {

	login($resul["USR_NAME"], $resul["USR_EMAIL"]);

	redirect('home.php?msg=Login Efetuado com Sucesso');
}
else if($name =="adm" && $pw=="adm"){
	redirect('adm.php?msg=Login Efetuado com Sucesso');
}
else{
	redirect('index.php?msg=Login Errado Tente Novamente');
}


?>