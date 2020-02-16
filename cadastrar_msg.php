<?php 

include 'init.php';
include 'connect.php';

$name= $_POST['msg'];




try {
	$smt = $con -> prepare("SELECT USR_ID FROM USER WHERE USR_NAME = ?");
	$smt -> bindParam(1, $_SESSION['nome']);
	$smt -> execute();
	$id = $smt -> fetch();

} catch (Exception $e) {
	$e -> getMessage();
}
if($name == ""){
	redirect('index.php?msg=texto obrigatorio');
}

if (!empty($id)) {
	
	$sm = $con ->prepare("INSERT INTO MSG(MS_TEXT, USR_ID) VALUES(?,?)");
	$sm -> bindParam(1,$name);
	$sm -> bindParam(2,$id['USR_ID']);
	$sm->execute();
	redirect("home.php?msg=pensamento cadastrado");
}


?>