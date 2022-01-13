<?php

class user{
    
    public $userid;
    public $database;

    public function getid(){
        return $this->userid;
    }

    public function setUser($ID){
        $this->userid = $ID;
    }

    public function createUserId(){
        $randomNumber = rand(100, 999);
        $randomTime = time();
        $random = "";
        $random .= $randomTime;
        $random .= $randomNumber;
        setcookie("user", $random, 0, "/");
        $this->userid = $random;
    }

    public function checkUserIdInDB(){
        include 'DBconfig.php';
      
        try {
            $conn = new PDO("mysql:host=$hostname;dbname=poll", $userName, $Password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $stmt = $conn->prepare("SELECT userid FROM votes WHERE userid = ?");
            $stmt->execute([$this->userid]);
            $userid = $stmt->fetchAll();

            foreach ($userid as $id) {
                if ($id == NULL) {
                   return false;
                }else {
                    return true;
                }
            }
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
          $conn = NULL;

    }

    public function setUserIdInDB(){

        include 'DBconfig.php';
      
        try {
            $conn = new PDO("mysql:host=$hostname;dbname=poll", $userName, $Password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $stmt = $conn->prepare("INSERT INTO votes(userid) VALUES(?)");
            $stmt->execute([$this->userid]);

          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
          $conn = NULL;
    }

    public function getVote(){
        include 'DBconfig.php';
      
        try {
            $conn = new PDO("mysql:host=$hostname;dbname=poll", $userName, $Password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $stmt = $conn->prepare("SELECT vote FROM votes WHERE userid = ?");
            $stmt->execute([$this->userid]);
            $vote = $stmt->fetch();

            foreach ($vote as $value) {
                switch ($value) {
                    case NULL:
                        return NULL;
                    case 0:
                        return '0';
                    case 1:
                        return '1';
                }
            }

        }   catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
          $conn = NULL;
    }

    public function setVote($Voted){
        
        include 'DBconfig.php';
      
        try {
            $conn = new PDO("mysql:host=$hostname;dbname=poll", $userName, $Password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $stmt = $conn->prepare("UPDATE votes set vote = ? WHERE userid = ?");
            $stmt->execute([$Voted, $this->userid]);

          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
          $conn = NULL;
    }
}