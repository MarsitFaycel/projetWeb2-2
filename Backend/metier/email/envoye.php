
<?php
  header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

include_once 'email.php';
$aaaa =$_POST['adressDestination'];
echo $aaaa;
echo "--";
echo $_POST['titre'];
echo "--";
echo $_POST['msg'];
echo "--";
echo $_POST['url'];
echo "--";
echo $_POST['nom'];





//$msg= new Email($_POST['adressDestination'],$_POST['titre'],$_POST['msg'],$_POST['url'],$_POST['nom']);
//$msg->envoye();
 ?>
