<?php
	header('Access-Control-Allow-Origin: *');

	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../model/auteur.php';


    //base de donne

	$database = new database();

    $db =$database->connect();

    //auteur

    $auteur= new Auteur($db);

	//$data= json_decode(file_get_contents("php://input"));


	$auteur->login = $_POST['login'];
	$auteur->password = password_hash($_POST['password'],PASSWORD_DEFAULT);

	$auteur->nom = $_POST['nom'];
	$auteur->prenom =$_POST['prenom'];
	$auteur->adresseMail= $_POST['adresseMail'];

 $resultat =$auteur->insert();

	if($resultat){

		$_SESSION['message']= "bonjour $prenom";
		echo "<script>location.href='../post/user.php';</script>";

	}else
	{		$_SESSION['message'] = "utilstaeur existe deja";//ajouter un message de notification
			//echo "<script type='text/javascript'>alert('$message');</script>";
			header('Location: ../auteur/formulaireAuteur.html?message=utilstaeur existe deja');

	}
	$message= isset($_SEESION['message']) ? $_SEESION['message']: die();
if($message){
echo "<script type='text/javascript'>alert('$message');</script>";
}
