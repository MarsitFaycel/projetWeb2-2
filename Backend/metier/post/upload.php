<?php
header('Access-Control-Allow-Origin: *');
	
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');
   
    include_once '../../config/database.php';
    include_once '../../model/photo.php';


    

    

if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        
       //base de donne

	$database = new database();	
	
    $db =$database->connect();
	//photo

   


	 
        $Photo_nom=$_POST['Photo_nom'];
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert image content into database
        $insert = $db->query("INSERT into Photo (Photo_nom,Photo_url, photo_date) VALUES ('$Photo_nom','$imgContent', '$dataTime')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>

///



<?

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
$_FILES['filep']['name'] = str_replace(' ', '%20', $_FILES['filep']['name']);
        
        //Insert image content into database
        $insert = $db->query("INSERT into Photo (Photo_nom,Photo_url, photo_date) VALUES ('$Photo_nom','".$_FILES['filep']['name']."', '$dataTime')");
        


if($insert) { echo "Image name saved into database"; }
else {

//Gives and error if its not
echo "Sorry, there was a problem uploading your file.";
}
}
?>


