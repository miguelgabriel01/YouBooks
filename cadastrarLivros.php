<?php 

include 'init.php';
include 'connect.php';

//são criadas variaveis para indicar os valores vindos do form de cadastro de livros
$name= $_POST['nomelivro'];//recebe o nome do livro
$genero= $_POST['genero'];//recebe o genero do livro
$escritor= $_POST['escritor'];//recebe o nome do escritor do livro
$ano= $_POST['ano'];




try {
	$smt = $con -> prepare("SELECT USR_ID FROM USERS WHERE USR_NAME = ?");
	$smt -> bindParam(1, $_SESSION['nome']);
	$smt -> execute();
	$id = $smt -> fetch();

} catch (Exception $e) {
	$e -> getMessage();
}
if($name == ""){//aqui verifica se o nome do livro esta preenchido
	redirect('index.php?msg=Nome do livro obrigatorio');
}

if (!empty($id)) {
	
	$sm = $con ->prepare("INSERT INTO LIVROS(LV_NOME,LV_GENERO,LV_ESCRITOR,LV_ANO,USR_ID) VALUES(?,?,?,?,?)");
	$sm -> bindParam(1,$name);
	$sm -> bindParam(2,$genero);
	$sm -> bindParam(3,$escritor);
	$sm -> bindParam(4,$ano);

	$sm -> bindParam(5,$id['USR_ID']);//o id do usuario é salvo no dado sobre o livro para possilitar identificar aquele dado como sendo do usuario logado
	$sm->execute();
	redirect("home.php?msg=livro cadastrado");
}

/*
CREATE TABLE LIVROS( 
    LV_ID INT NOT NULL AUTO_INCREMENT,
    LV_NOME VARCHAR(250) NOT NULL,
    LV_GENERO VARCHAR(250) NOT NULL,
    LV_ESCRITOR VARCHAR(250) NOT NULL,
    LV_ANO VARCHAR(250) NOT NULL,
    USR_ID INT NOT NULL,
    PRIMARY KEY(LV_ID),
    /*FOREIGN KEY(USR_ID) REFERENCES USERS (USR_ID)*/
//CONSTRAINT FK_USER FOREIGN KEY (USR_ID) REFERENCES USERS (USR_ID)
//);



?>