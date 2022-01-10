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
}
