<?php

class user{
    
    public $userid;

    public function getid(){
        return $this->userid;
    }
    public function setUser($ID){
        $this->userid = $ID;
    }
    public function createUser(){
        $randomNumber = rand(100, 999);
        $randomTime = time();
        $random = "";
        $random .= $randomTime;
        $random .= $randomNumber;
        setcookie("user", $random, 0, "/");
        $this->userid = $random;
    }
    public function checkUserInDB(){
        require 'DBconfig.php';
        try{
            $database = new PDO("mysql:host=$hostname;dbname=poll", $userName, $Password);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

        $query = 'SELECT * FROM vraagstelling';

        $result = $database->prepare($query);
        $result->execute(array());
        $result->setFetchMode(PDO::FETCH_ASSOC);
        var_dump($result);

    }
    public function setUserInDB(){


    }
}
