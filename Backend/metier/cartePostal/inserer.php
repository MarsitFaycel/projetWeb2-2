<?php
	header('Access-Control-Allow-Origin: *');

	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../model/cartePostale.php';


    //base de donne

	$database = new database();

    $db =$database->connect();

    //cartePostale

    $cartePostale= new CartePostale($db);

	//$data= json_decode(file_get_contents("php://input"));

	$cartePostale->adresseDestination = $_POST['adresseDestination'];
	$cartePostale->msg = $_POST['msg'];

	$cartePostale->Photo_Photo_id = $_POST['Photo_Photo_id'];


	if($cartePostale->insert()){
		echo json_encode(
			array('message'=>'CartePostale cree'));
	}else
	{	echo json_encode(
			array('message'=>'CartePostale non cree!!!!!!'));
	}
