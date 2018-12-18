<?
header('Access-Control-Allow-Origin: *');
	
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');
   
    include_once '../../config/database.php';
    include_once '../../model/photo.php';


    //base de donne

	$database = new database();	
	
    $db =$database->connect();

$query ="SELECT Photo_url FROM Photo "; 
 $stmt = $db->prepare($query);
            $stmt->execute();


//Puts it into an array
$file_path ='http://localhost/projetWeb/Backend/metier/post/uploads/';

while($row =  $stmt->fetch(PDO::FETCH_ASSOC))
{//Outputs the image and other data
$src=$file_path.$row['Photo_url'];
echo "<img src=".$src.">  <br>";
echo $src;
}
 
?>
