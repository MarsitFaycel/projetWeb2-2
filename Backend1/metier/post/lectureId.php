<?php
header('Access-Control-Allow-Origin: *');
   
include_once '../../config/database.php';
include_once '../../model/photo.php';


//base de donne

$database = new database();
$db =$database->connect();

//photo

$photo= new Photo($db);

$photo-> id = isset($_GET['id']) ? $_GET['id'] : die();

$photo->lectureId();

//tableau

$tableau_photo = array(
    'id'=>$photo->id,
    'Photo_nom '=>$photo->Photo_nom,
    'Photo_url'=> $photo->Photo_url,
    'Album_nom'=> $photo->Album_nom
);

print_r(json_encode($tableau_photo));
