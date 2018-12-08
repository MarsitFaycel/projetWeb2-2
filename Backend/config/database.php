<?php
 class database{
     //attribues
     private $host = 'localhost';
     private $db_name = 'id7562739_projetweb';
     private $username = 'root';
     private $password = '';
     private $conn;
    
     //connection
     public function connect(){
         $this->conn= null; 
         try{
             $this->conn= new PDO('mysql:host='. $this->host.';dbname='.$this->db_name,$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         }catch(PDOException $e ){
             echo 'Connection error :'. $e->getMessage();
         }
         return $this->conn;
         
     }  
 }
