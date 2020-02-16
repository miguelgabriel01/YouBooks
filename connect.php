<!--Neste arquivo são informados o usuario e senha do BD, alem de informar a porta, nome d banco e o tipo de conexão
é obrigatorio ter em todos os arquivos  !-->
<?php 

	$user = "root";
	$password = "miguelgabriel123";

	global $con;

	try{
		$con = new PDO('mysql:host=localhost:3306;dbname=livros;charset=utf8', 'root', 'miguelgabriel123');
	}
	catch(PDOException $e){
		$e -> getMessage();
	}


?>