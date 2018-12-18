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
    'Photo_nom'=>$photo->Photo_nom,
    'Photo_url'=> $photo->Photo_url,
    'id_Auteur'=> $photo->id_Auteur,
    'id_Album'=> $photo->id_Album
);

?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleLectureId.css">
    <title>Page1</title>
</head>
<body>


<form action=update.php method=post enctype="multipart/form-data">
    <table class="table">
      <thead>
        <tr>
          <th>photo_id</th>
          <th>Photo_nom</th>
          <th>Photo_url</th>
          <th>id_Auteur</th>
          <th>id_Album</th>


        </tr>
      </thead>

      <tr>
          <td><input type="text"  name='id'  value="<?php echo $tableau_photo['id'] ?>"></td>
          <td><input type="text" name='Photo_nom' value="<?php echo $tableau_photo['Photo_nom'] ?>"></td>
          <td><input type="text" name='Photo_url' value="<?php echo $tableau_photo['Photo_url'] ?>"></td>
          <td><input type="text"  name='id_Auteur' value="<?php echo $tableau_photo['id_Auteur'] ?>"></td>
          <td><input type="text" name='id_Album' value="<?php echo $tableau_photo['id_Album'] ?>"></td>
          <td>  <input type=submit name=action value="update"></td>

        </tr>
          <tr>
            <td colspan=5><p align=center><?php $file_path ='http://localhost/projetWeb/Backend/metier/post/uploads/';
              $src=$file_path.$tableau_photo['Photo_url'];
              echo "<img src=".$src." height='500px' width='700px'>  ";?></td>
          </tr>

        </table>



    </form>
</body>
</html>
