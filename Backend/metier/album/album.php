
<?php
    header('Access-Control-Allow-Origin: *');

    include_once '../../config/database.php';
    include_once '../../model/album.php';

    session_start();


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
          <a href="delete.php?id=<?php echo $row['Album_id'];?>">delete</a>
    </tr>


  <?php  array_push($_SESSION['listeIDAlbum'],$listeid);
  array_push($_SESSION['listeAlbum'],$liste);
  array_push($_SESSION['AlbumDate'],$listeDate);
  endwhile;  ?>
