<?php
	header('Access-Control-Allow-Origin: *');

	header('Access-Control-Allow-Methods: PUT');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../model/photo.php';


    //base de donne



echo "eeeee";

    //update

			$database = new database();

		    $db =$database->connect();

		    //photo


	$Photo_id= $_POST['id'];


	$Photo_nom = $_POST['Photo_nom'];
	$Photo_url = $_POST['Photo_url'];

	$id_Album = $_POST['id_Album'];
	$id_Auteur =$_POST['id_Auteur'];

	$update=$db->query("UPDATE Photo SET Photo_nom ='$Photo_nom' ,Photo_url='$Photo_url',id_Album='$id_Album',id_Auteur='$id_Auteur' WHERE Photo_id='$Photo_id'");

	if($update){
		echo "File uploaded successfully.";
		header('Location: user.php');

	}else
	{	echo "File error.";
	}
?>
