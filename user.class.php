<?php

class user{
    
    public $mac;

    public function __construct($mac){
        $this->mac = $mac;
    }
    public function getmacfromdb(){
        
    }
    public function getmac(){
        return $this->mac;
    }
}