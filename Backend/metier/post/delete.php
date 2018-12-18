<?php
header('Access-Control-Allow-Origin: *');

include_once '../../config/database.php';
include_once '../../model/photo.php';


//base de donne


$database = new database();
$db =$database->connect();

//photo

$photo_id= isset($_GET['id']) ? $_GET['id'] : die();
$delete=$db->query("DELETE FROM Photo WHERE Photo_id='$photo_id'");


if($delete){
  echo "File uploaded successfully.";
  header('Location: user.php');


}else
{	echo "File error.";
}
?>
