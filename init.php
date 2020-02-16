<?php 

session_start();

	function logado(){
		return $_SESSION['logado']?? false;
	}

	function login($name, $email){
		$_SESSION['logado'] = true;
		$_SESSION['nome'] = $name;
		$_SESSION['email'] =  $email;
		return true;
	}
	
	function redirect($url){
		header('location:' . $url);
		exit();
	}	


	function logout(){
		session_destroy();
	}


 ?>