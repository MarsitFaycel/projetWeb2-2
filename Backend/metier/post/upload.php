<?php
header('Access-Control-Allow-Origin: *');

	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

    include_once '../../config/database.php';
    include_once '../../model/photo.php';


 session_start();


if ($_POST["action"] == "Load")
{
$folder = "uploads/";



move_uploaded_file($_FILES["filep"]["tmp_name"] , "$folder".$_FILES["filep"]["name"]);

echo "<p align=center>File ".$_FILES["filep"]["name"]."loaded...";

$database = new database();

    $db =$database->connect();
	//photo





        $Photo_nom=$_POST['Photo_nom'];
        $dataTime = date("Y-m-d H:i:s");
				$id_Album=$_POST['Album_id'];
					$id_Auteur=$_SESSION['Auteur_id'];
$_FILES['filep']['name'] = str_replace(' ', '%20', $_FILES['filep']['name']);//remplacer espace par %20

        //Insert image content into database
        $insert = $db->query("INSERT into Photo (Photo_nom,Photo_url, photo_date,id_Album,id_Auteur) VALUES ('$Photo_nom','".$_FILES['filep']['name']."', '$dataTime','$id_Album','$id_Auteur')");



if($insert) { echo "Image name saved into database";
header('Location: user.php'); }
else {

//Gives and error if its not
echo "Sorry, there was a problem uploading your file.";
}
}
?>
