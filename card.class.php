<?php
class card{
    public $vraagstelling;

    public function setCard(){

        require 'DBconfig.php';
        try{
            $conn = new PDO("mysql:host=$hostname;dbname=poll", $userName, $Password);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $conn->query("SELECT vraagstelling FROM vraagstelling");

            foreach ($stmt->fetch() as $value) {
             $this->vraagstelling = $value;
            }

        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }
    public function getCard(){
        echo'
        <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">'.$this->vraagstelling.'</h5>
        <p class="card-text"><a href="#" class="btn btn-success">Eens</a>
        <a href="#" class="btn btn-danger">Oneens</a></p>
        </div>
        </div>
        
        ';
        
    }

}