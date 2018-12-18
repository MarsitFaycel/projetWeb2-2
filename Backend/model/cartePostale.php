<?php
    class CartePostale{
        //DB
        private $conn;
        private $table = 'CartePostale';

        //attribues Photo

        public $idCartePostale;
        public $adresseDestination;
        public $msg;
        public $Photo_Photo_id;

        //constructeur base de doneee

        public function __construct($db) {
            $this->conn = $db;

        }
        // fonction lecture affiche les photos par album
        public function lecture() {
            $query = 'SELECT * FROM CartePostale' ; // ()-->Mariadb!!!


            //execution
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return($stmt);


        }

        //fonction lectureId affiche photo par id

        public function lectureId(){
            $query = 'SELECT
                    p.adresseDestination,
                    p.msg,
                    p.Photo_Photo_id
                    FROM
                    '. $this->table;
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1 , $this->id);//http://localhost/projetWeb/api/post/lectureId.php?id=2
            $stmt->execute();
            $row= $stmt->fetch(PDO::FETCH_ASSOC);

            $this->adresseDestination= $row['adresseDestination'];
            $this->msg= $row['msg'];
            $this->Photo_Photo_id= $row['Photo_Photo_id'];
        }



        //fonction insert inserer une photo

        public function insert(){
            $query='INSERT INTO ' .
                $this->table . '
                SET
                adresseDestination = :adresseDestination,
		            msg = :msg,
		            Photo_Photo_id= :Photo_Photo_id';// pas espace apres : !!!!!!!!

            $stmt = $this->conn->prepare($query);

            //verification des donne!!!
            $this->adresseDestination = htmlspecialchars(strip_tags($this->adresseDestination));
            $this->msg = htmlspecialchars(strip_tags($this->msg));
            $this->Photo_Photo_id = htmlspecialchars(strip_tags($this->Photo_Photo_id));


		//binding data
            $stmt->bindParam(':adresseDestination' , $this->adresseDestination);
            $stmt->bindParam(':msg' , $this->msg);
            $stmt->bindParam(':Photo_Photo_id' , $this->Photo_Photo_id);

            //execution
            if ($stmt->execute()) {
                return true;
            } else {
                printf("Error %s. \n",$stmt->erro);
                return false;

            }

        }


         //fonction update mettre a jour une photo

         public function update(){
            $query='UPDATE' .
                $this->table . '
                SET
                adresseDestination = :adresseDestination,
		            msg = :msg,
		            Photo_Photo_id= :Photo_Photo_id
                WHERE idCartePostale =:idCartePostale';// pas espace apres : !!!!!!!!

            $stmt = $this->conn->prepare($query);

            //verification des donne!!!
            $this->adresseDestination = htmlspecialchars(strip_tags($this->adresseDestination));
            $this->msg = htmlspecialchars(strip_tags($this->msg));
            $this->Photo_Photo_id = htmlspecialchars(strip_tags($this->Photo_Photo_id));

            $this->idCartePostale = htmlspecialchars(strip_tags($this->idCartePostale));

            //binding data
            $stmt->bindParam(':adresseDestination' , $this->adresseDestination);
            $stmt->bindParam(':msg' , $this->msg);
            $stmt->bindParam(':Photo_Photo_id' , $this->Photo_Photo_id);
            $stmt->bindParam(':idCartePostale' , $this->idCartePostale);

            //execution
            if ($stmt->execute()) {
                return true;
            } else {
                printf(" update Error  %s. \n",$stmt->erro);
                return false;

            }

        }

    }
