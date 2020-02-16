<?php 

include 'init.php';
include 'connect.php';

$id = $_GET['rm'];

if (!empty($id)) {
	
	$smt = $con -> prepare("DELETE FROM USER WHERE USR_ID = ?");
	$smt -> bindParam(1,$id);
	$smt->execute();
	redirect('adm.php?msg=Usuario removido');
}


?>