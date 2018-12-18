<?php
	header('Access-Control-Allow-Origin: *');

	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../model/auteur.php';


    //base de donne

	$database = new database();

    $db =$database->connect();

    //photo

    $auteur= new Auteur($db);

	//$data= json_decode(file_get_contents("php://input"));

	$auteur->login = $_POST['login'];
	$auteur->password = $_POST['password'];

	$auteur->nom = $_POST['nom'];
	$auteur->prenom =$_POST['prenom'];
	$auteur->adresseMail= $_POST['adresseMail'];

 $resultat =$auteur->insert();

	if($resultat){

		echo json_encode(
			array('message'=>'Auteur cree'));

	}else
	{	echo json_encode(
			array('message'=>'CartePostale non cree!!!!!!'));
	}
