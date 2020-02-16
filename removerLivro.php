<?php 

include 'init.php';
include 'connect.php';

$id = $_GET['rm'];

if (!empty($id)) {
    
    //	$smt = $con -> prepare("DELETE FROM PIZZA WHERE PZ_ID = ?");


	$smt = $con -> prepare("DELETE FROM LIVROS WHERE LV_ID = ?");
	$smt -> bindParam(1,$id);
	$smt->execute();
	redirect('home.php?msg=lIVRO removido');
}


?>