<?php
    class Auteur{
        //DB
        private $conn;
        private $table = 'Auteur';

        //attribues Photo

        public $Auteur_id;
        public $login;
        public $password;
        public $nom;
	      public $prenom;
	      public $adresseMail;
        public $role;

        //constructeur base de doneee

        public function __construct($db) {
            $this->conn = $db;

        }
        // fonction lecture affiche les auteurs par album
        public function lecture() {
            $query = 'SELECT
                    p.Auteur_id,
                    p.login,
                    p.password,
		                p.nom,
                    p.prenom,
	                  p.adresseMail,
		                p.role
                    FROM
                    '. $this->table ; // ()-->Mariadb!!!


            //execution
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return($stmt);


        }

        //fonction lectureId affiche auteur par id

        public function lectureId(){
            $query = 'SELECT
                    p.login,
                    p.password,
		    p.nom,
                    p.prenom,
	            p.adresseMail,
		    p.role
                    FROM
                    '. $this->table.'
                    WHERE
                    p.Auteur_id = ?' ;
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1 , $this->Auteur_id);//http://localhost/projetWeb/api/post/lectureId.php?id=2
            $stmt->execute();
            $row= $stmt->fetch(PDO::FETCH_ASSOC);
            return($row);

        }


        //fonction lectureId affiche auteur par id

        public function Id(){
            $query = 'SELECT
            Auteur_id,
            password,
            nom,
            prenom,
            adresseMail
                    FROM
                    '. $this->table.'
                    WHERE
                    login = ? ' ;
            $stmt = $this->conn->prepare($query);

          //  $stmt->bindParam(':login' , $this->login);//http://localhost/projetWeb/api/post/lectureId.php?id=2
          //    $stmt->bindParam(':password' , $this->password);
              $stmt->bindParam(1 , $this->login);//http://localhost/projetWeb/api/post/lectureId.php?id=2
              //  $stmt->bindParam(2 , $this->password);
            $stmt->execute();
            $row= $stmt->fetch(PDO::FETCH_ASSOC);

            $this->Auteur_id= $row['Auteur_id'];
            $this->password= $row['password'];
            $this->nom= $row['nom'];
            $this->prenom= $row['prenom'];
            $this->adresseMail= $row['adresseMail'];



        }






        //fonction insert inserer une auteur

        public function insert(){

          //verifier que c'est un nouveau compte

          $queryVerify='SELECT login FROM Auteur WHERE adresseMail = :adresseMail ';
            $stmtVerify = $this->conn->prepare($queryVerify);
             $this->adresseMail = htmlspecialchars(strip_tags($this->adresseMail));
            $stmtVerify->bindParam(':adresseMail' , $this->adresseMail);

            $stmtVerify->execute();
            //$resultat=$stmtVerify->fetch(PDO::FETCH_ASSOC);

            if($stmtVerify->rowCount() >0){
              echo "user existe";
              return false;
                }else{



            $query='INSERT INTO ' .
                $this->table . '
                SET
                login = :login,
                password = :password,
		nom = :nom,
		prenom = :prenom,
		adresseMail = :adresseMail,
		role = :role';// pas espace apres : !!!!!!!!

            $stmt = $this->conn->prepare($query);

            //verification des donne!!!
            $this->login = htmlspecialchars(strip_tags($this->login));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->nom = htmlspecialchars(strip_tags($this->nom));
	    $this->prenom = htmlspecialchars(strip_tags($this->prenom));
	    $this->adresseMail = htmlspecialchars(strip_tags($this->adresseMail));
            $this->role = htmlspecialchars(strip_tags($this->role));

		//binding data
            $stmt->bindParam(':login' , $this->login);
            $stmt->bindParam(':password' , $this->password);
            $stmt->bindParam(':nom' , $this->nom);
	    $stmt->bindParam(':prenom' , $this->prenom);
	    $stmt->bindParam(':adresseMail' , $this->adresseMail);
	    $stmt->bindParam(':role' , $this->role);






            //execution
            if ($stmt->execute()) {
                return true;
            } else {
                printf("Error %s. \n",$stmt->erro);
                return false;

            }

        }

}
         //fonction update mettre a jour un auteur

         public function update(){
            $query='UPDATE' .
                $this->table . '
                SET
                 login = :login,
                password = :password,
		nom = :nom,
		prenom = :prenom,
		adresseMail = :adresseMail,
		role = :role
                WHERE Auteur_id =:Auteur_id';// pas espace apres : !!!!!!!!

            $stmt = $this->conn->prepare($query);

            //verification des donne!!!
             $this->login = htmlspecialchars(strip_tags($this->login));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->nom = htmlspecialchars(strip_tags($this->nom));
	    $this->prenom = htmlspecialchars(strip_tags($this->prenom));
	    $this->adresseMail = htmlspecialchars(strip_tags($this->adresseMail));
            $this->role = htmlspecialchars(strip_tags($this->role));


            $this->Auteur_id = htmlspecialchars(strip_tags($this->Auteur_id));

            //binding data
           $stmt->bindParam(':login' , $this->login);
            $stmt->bindParam(':password' , $this->password);
            $stmt->bindParam(':nom' , $this->nom);
	    $stmt->bindParam(':prenom' , $this->prenom);
	    $stmt->bindParam(':adresseMail' , $this->adresseMail);
	    $stmt->bindParam(':role' , $this->role);



            //execution
            if ($stmt->execute()) {
                return true;
            } else {
                printf(" update Error  %s. \n",$stmt->erro);
                return false;

            }

        }

    }
