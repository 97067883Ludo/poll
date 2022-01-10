<?php

class user{
    
    public $userid;

    public function __construct($userid){
        $this->userid = $userid;
    }
    public function getid(){
        return $this->userid;
    }
}
