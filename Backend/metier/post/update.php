<?php
	header('Access-Control-Allow-Origin: *');
	
	header('Access-Control-Allow-Methods: PUT');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');
   
    include_once '../../config/database.php';
    include_once '../../model/photo.php';


    //base de donne

	$database = new database();	
	
    $db =$database->connect();

    //photo

    $photo= new Photo($db);

    $data= json_decode(file_get_contents("php://input"));
    
    //update
	$photo->id= $data->id;

	
	$photo->Photo_nom = $data->Photo_nom;
	$photo->Photo_url = $data->Photo_url;
	
	$photo->id_Album = $data->id_Album;
	$photo->id_Auteur =$data->id_Auteur;
	$photo->photo_date= $data->photo_date;		
	
	if($photo->update()){
		echo json_encode(
			array('message'=>'Photo updates'));
	}else
	{	echo json_encode(
			array('message'=>'Photo non updated!!!!!!'));
	}

