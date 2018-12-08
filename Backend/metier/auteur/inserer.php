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

    $photo= new Auteur($db);

	//$data= json_decode(file_get_contents("php://input"));
	
	$photo->login = $_POST['login'];
	$photo->password = $_POST['password'];
	
	$photo->nom = $_POST['nom'];
	$photo->prenom =$_POST['prenom'];
	$photo->adresseMail= $_POST['adresseMail'];
	$photo->role= $_POST['role'];
            		
	
	if($photo->insert()){
		echo json_encode(
			array('message'=>'Photo cree'));
	}else
	{	echo json_encode(
			array('message'=>'Photo non cree!!!!!!'));
	}

