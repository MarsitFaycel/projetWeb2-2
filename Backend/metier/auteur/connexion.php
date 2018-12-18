<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

  include_once '../../config/database.php';
  include_once '../../model/auteur.php';


  //session
 session_start();


  //base de donne

  $database = new database();
  $db =$database->connect();

  $auteur= new Auteur($db);

  $auteur-> login = isset($_POST['login']) ? $_POST['login'] : die();
  //$auteur-> password = isset($_POST['password']) ? $_POST['password'] : die();

  $auteur->Id();
  /*echo $_POST['password'];
  echo "------------";
  echo $auteur->password;
  echo "------";
  $res= (password_verify($_POST['password'], $auteur->password));
  echo  password_hash($_POST['password'],PASSWORD_DEFAULT);

  if(password_verify($_POST['password'], $auteur->password)){
    echo "ok";
    $tableau_auteur = array(
      'Auteur_id'=> $auteur->Auteur_id,
      'password'=> $auteur->password,
      'nom'=> $auteur->nom,
      'prenom'=> $auteur->prenom,
      'adresseMail'=> $auteur->adresseMail


    );
*/if(password_verify($_POST['password'], $auteur->password)){
$_SESSION['Auteur_id']= $auteur->Auteur_id;
$_SESSION['password']= $auteur->password;
$_SESSION['nom']= $auteur->nom;
$_SEESION['prenom']= $auteur->prenom;
$_SEESION['adresseMail']= $auteur->adresseMail;
  echo "<script>location.href='../post/user.php';</script>";
  }else {
    echo "<script>location.href='error.php';</script>";
  }

  //tableau



?>
<html>
<head>

</head>
<body>

  <input type="text"  name='Auteur_id'  value="<?php echo $tableau_auteur['Auteur_id'] ?>">
          <input type="text"  name='password'  value="<?php echo $tableau_auteur['password'] ?>">
          <input type="text"  name='nom' value="<?php echo $tableau_auteur['nom'] ?>">
            <input type="text" name='prenom' value="<?php echo $tableau_auteur['prenom'] ?>">S





  </body>
  </html>
