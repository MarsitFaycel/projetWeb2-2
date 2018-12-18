cartePostale<?php
    header('Access-Control-Allow-Origin: *');

    include_once '../../config/database.php';
    include_once '../../model/cartePostale.php';


    //base de donne

    $database = new database();
    $db =$database->connect();

    //cartePostale

    $cartePostale= new CartePostale($db);

    //appel method de lecture

    $result= $cartePostale->lecture();
    ///

    $num = $result->rowCount();

    if ($num > 0) {
        $tableau_cartePostale= array();
        $tableau_cartePostale['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $tableau_items = array (
                'idCartePostale' => $idCartePostale,
                'adresseDestination ' => $adresseDestination,
                'msg' => $msg,
		            'Photo_Photo_id' => $Photo_Photo_id



            );


            array_push($tableau_cartePostale['data'],$tableau_items);

            }    //conversion en format json

    echo json_encode($tableau_cartePostale);
     echo "<table><tr><th>ID</th><th>Name</th></tr>";

    } else {
        echo json_encode(
            array('message' =>'no cartePostales ')
        );
    }
?>
