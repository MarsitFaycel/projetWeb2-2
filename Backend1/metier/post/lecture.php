<?php
    header('Access-Control-Allow-Origin: *');
   
    include_once '../../config/database.php';
    include_once '../../model/photo.php';


    //base de donne

    $database = new database();
    $db =$database->connect();

    //photo

    $photo= new Photo($db);

    //appel method de lecture

    $result= $photo->lecture();
    ///

    $num = $result->rowCount();

    if ($num > 0) {
        $tableau_photo= array();
        $tableau_photo['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $tableau_items = array (
                'Photo_id' => $Photo_id,
                'Photo_nom ' => $Photo_nom,
                'Photo_url' => $Photo_url,
		'photo_date' => $photo_date,
                'Album_nom' => $Album_nom

                
            );


            array_push($tableau_photo['data'],$tableau_items);

            }    //conversion en format json

    echo json_encode($tableau_photo);
        
    } else {
        echo json_encode(
            array('message' =>'no photos ')
        );
    }
    
