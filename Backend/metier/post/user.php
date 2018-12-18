<!DOCTYPE html>
<html>
<title>Profil</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/styleUser.css">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="profile.jpg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Nom Auteur </b></h4>
    <p class="w3-text-grey">BREACK-LIMIT'S</p>
  </div>
  <div class="w3-bar-block">
    <a href="#profil" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>profil</a>
    <a href="#ajouterImage" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-photo fa-fw w3-margin-right"></i>ajouter Image</a>
    <a href="#album" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-folder fa-fw w3-margin-right"></i>Album</a>
    <a href="#CartePostale" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>Carte Postale</a>
    <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i>log out</a>
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</nav>

<!-- responsive pour 500px -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px">







  <!-- profil -->
  <header id="profil">
    <a href="#"><img src="profile.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Mon Profile</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
      <span class="w3-margin-right">Filtrer par:</span>
      <button class="w3-button w3-black"><i class="fa fa-id-badge w3-margin-right"></i>nom</button>
      <button class="w3-button w3-black"><i class="fa fa-calendar w3-margin-right"></i>date</button>
      <button class="w3-button w3-black w3-hide-small"><i class="fa fa-photo w3-margin-right"></i>Album</button>
    </div>
    </div>
  </header>







  <!-- liste de photo-->
  <div class="w3-row-padding">
	   <?php
  header('Access-Control-Allow-Origin: *');

    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-type,Access-Control-Allow-Methods,Authorization, X-Requested-With');

      include_once '../../config/database.php';
      include_once '../../model/photo.php';
      session_start(); //session


      //base de donne

    $database = new database();

      $db =$database->connect();

  $query ="SELECT
          p.Photo_id,
          p.Photo_nom,
          p.Photo_url,
          p.photo_date,
          a.Album_nom
          FROM
          Photo p
          LEFT JOIN Album a
          ON (a.Album_id = p.id_Album)
          WHERE p.id_Auteur = ".$_SESSION['Auteur_id'];
   $stmt = $db->prepare($query);
    $stmt->execute();//retourne  1 ou 0

    ?>


    <div class="">
    <table class="table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Photo_nom</th>
          <th>Photo_date</th>
          <th>Album</th>


          <th colspan="2">Action</th>

        </tr>
      </thead>

      <?php
      while($row =  $stmt->fetch(PDO::FETCH_ASSOC)): ?>
      <tr>
          <td><?php $file_path ='http://localhost/projetWeb/Backend/metier/post/uploads/';
            $src=$file_path.$row['Photo_url'];
            echo "<img src=".$src." height='100px' width='100px'>  ";?></td>
          <td><?php echo $row['Photo_nom'] ?></td>
          <td><?php echo $row['photo_date'] ?></td>
          <td><?php echo $row['Album_nom'] ?></td>
          <td>
              <a href="lectureId.php?id=<?php echo $row['Photo_id'];?>">Edit</a>
              <a href="delete.php?id=<?php echo $row['Photo_id'];?>">delete</a>
              <a href="../email/envoye.php?photourl=<?php echo $src;?>">envoyer Carte Postale</a>
        </tr>
      <?php endwhile;?>



    </table>




  </div>






  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>








  <!-- Ajouter image -->
  <div class="w3-row-padding w3-padding-16" style="background :#D3D3D3" id="ajouterImage">
   <h1><b>Ajouter Une Image</b></h1>

<form action='upload.php' method=post enctype="multipart/form-data">
<table border="0" cellspacing="0" align=center cellpadding="3" bordercolor="#cccccc">
<tr>
<td><label>Votre Photo:</label></td>
<td><input type="text" name="Photo_nom" placeholder="Saisir  nom" size="30" maxlength="20"  required/></td>
<td>
 <select class="" name="Album_id">
   <?php for ($i=0; $i <count($_SESSION['listeAlbum']) ; $i++) {?>
     <option  value="<?php echo $_SESSION['listeIDAlbum'][$i] ?>"><?php echo $_SESSION['listeAlbum'][$i] ?></option>

   <?php } ?>

</select> </td>
</tr>
<tr>
  <td><input type="file" name="filep" size=45></td>
<td colspan=2><p align=center>
<input type=submit name=action value="Load" >
</td>
</tr>
</table>
</form>
  </div>







  <!-- Album -->
  <div class="w3-row-padding w3-padding-16" style="background :#A9A9A9" id="album">

   <h1><b>Album</b></h1>

   <?php

       include_once '../../model/album.php';




       //base de donne

       $database = new database();
       $db =$database->connect();

       //photo

       $album= new Album($db);

       //appel method de lecture

       $resultat= $album->lecture();

       $liste=array();
         $listeid=array();
         $listeDate=array();
         $_SESSION['listeAlbum']=array();
         $_SESSION['listeIDAlbum']=array();
         $_SESSION['AlbumDate']=array();


   ?>

   <div class="">
   <table class="table">
     <thead>
       <tr>
         <th>Id </th>
         <th>nom album</th>
         <th>date</th>



         <th colspan="2">Action</th>

       </tr>
     </thead>

     <?php
     while($row =  $resultat->fetch(PDO::FETCH_ASSOC)): ?>
     <tr>

         <td><?php echo $row['Album_id'];$listeid=$row['Album_id']; ?></td>
         <td><?php echo $row['Album_nom'] ;$liste=$row['Album_nom']; ?></td>
         <td><?php echo $row['Album_time'];$listeDate=$row['Album_time']; ?></td>
         <td>
             <a href="edit.php?id=<?php echo $row['Album_id'];?>">Edit</a>
             <a href="delete.php?id=<?php echo $row['Album_id'];?>">delete</a></td>
       </tr>


     <?php  array_push($_SESSION['listeIDAlbum'],$listeid);
     array_push($_SESSION['listeAlbum'],$liste);
     array_push($_SESSION['AlbumDate'],$listeDate);
     endwhile;  ?>
</table>

  </div>

</div>

















  <!-- Carte Postale-->
  <div class="w3-container w3-padding-large w3-grey"style="background:#585858" id="CartePostale">
    <h4 ><b>Carte Postale</b></h4>
    <form class="" action="../email/envoyer.php" method="post">


	 <h1><b>Envoyer Une CartePostale</b></h1>
          <label  >Nom</label>
          <input  type="text" name="Email" required><br>

          <label size=20px>Email</label>
          <input  type="text" name="Email" required><br>

          <label >Message</label>
          <input  type="text" name="Message" required><br>

          <button type="submit"  class="w3-button w3-black w3-margin-bottom" style="margin-left:100px;margin-top:10px;width:250px"><i class="fa fa-paper-plane w3-margin-right"></i>envoyer Carte</button>
    </form>
  </div>
</header>

  </div>



<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
