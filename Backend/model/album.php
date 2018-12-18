<?php
  /**
   *
   */
  class Album
  {
    private $conn;
    private $table = 'Album';

    //attribue Album

      public $Album_id;
      public $Album_nom;
      public $Album_time;
      public $id_Auteur;

    public function __construct($db)
    {
    $this->conn= $db;

    }



    public function insert(){

      //verifier que c'est un nouveau album

      $queryVerify='SELECT Album_nom FROM Album WHERE id_Auteur = :id_Auteur ';
        $stmtVerify = $this->conn->prepare($queryVerify);
         $this->id_Auteur = htmlspecialchars(strip_tags($this->id_Auteur));
        $stmtVerify->bindParam(':id_Auteur' , $this->id_Auteur);

        $stmtVerify->execute();
        //$resultat=$stmtVerify->fetch(PDO::FETCH_ASSOC);

        if($stmtVerify->rowCount() >0){
          echo "user existe";//message ?????
          return false;
            }else{



        $query='INSERT INTO ' .
            $this->table . '
            SET
            Album_id = :Album_id,
            Album_time = :Album_time,
            id_Auteur = :id_Auteur';// pas espace apres : !!!!!!!!

        $stmt = $this->conn->prepare($query);

        //verification des donne!!!
        $this->Album_nom = htmlspecialchars(strip_tags($this->Album_nom));
        $this->Album_time = date("Y-m-d H:i:s");
        $this->id_Auteur = htmlspecialchars(strip_tags($this->id_Auteur));


//binding data
        $stmt->bindParam(':Album_nom' , $this->Album_nom);
        $stmt->bindParam(':Album_time' , $this->Album_time);
        $stmt->bindParam(':id_Auteur' , $this->id_Auteur);






        //execution
        if ($stmt->execute()) {
            return true;
        } else {
            printf("Error %s. \n",$stmt->erro);
            return false;

        }

    }

}


  //select *

  public function lecture() {
      $query = "SELECT
            Album_id,
            Album_nom,
            Album_time
              FROM
              Album
              WHERE
              id_Auteur =".$_SESSION['Auteur_id'];               ; // ()-->Mariadb!!!


      //execution
      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return($stmt);


  }




  }

 ?>
