<?php
	header('Access-Control-Allow-Origin: *');
	
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');
   
    include_once '../../config/database.php';
    include_once '../../model/photo.php';


    //base de donne

	$database = new database();	
	
    $db =$database->connect();

    //photo

    $photo= new Photo($db);

	//$data= json_decode(file_get_contents("php://input"));
	
	$photo->Photo_nom = $_POST['Photo_nom'];
	$photo->Photo_url = $_POST['Photo_url'];
	
	$photo->id_Album = $_POST['id_Album'];
	$photo->id_Auteur =$_POST['id_Auteur'];
	$photo->photo_date= $_POST['photo_date'];
            		
	
	if($photo->insert()){
		echo json_encode(
			array('message'=>'Photo cree'));
	}else
	{	echo json_encode(
			array('message'=>'Photo non cree!!!!!!'));
	}

