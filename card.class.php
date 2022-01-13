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
        <p class="card-text"><button class="btn btn-success"><a href="?action=Eens" class="btn btn-success">Eens</a></button>
        <button class="btn btn-danger"><a href="?action=Oneens" class="btn btn-danger">Oneens</a></button></p>
        </div>
        </div>
        ';
    }
    public function getDisabledCard(){
        echo'
        <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">'.$this->vraagstelling.'</h5>
        <p class="card-text"><button class="btn btn-success" disabled="disabled"><a href="?action=Eens" class="btn btn-success">Eens</a></button>
        <button class="btn btn-danger" disabled="disabled"><a href="?action=Oneens" class="btn btn-danger">Oneens</a></button></p>
        </div>
        </div>
        ';
    }
    public function getDisabledCardWithnumbers(){
        


        require 'DBconfig.php';
        try{
            $conn = new PDO("mysql:host=$hostname;dbname=poll", $userName, $Password);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $yesVote = $conn->query("SELECT count( vote ) FROM votes WHERE vote = 1");

            foreach ($yesVote->fetch() as $value) {
             $YESVOTE = $value;
            }

            $conn = new PDO("mysql:host=$hostname;dbname=poll", $userName, $Password);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $noVote = $conn->query("SELECT count( vote ) FROM votes WHERE vote = 0");

            foreach ($noVote->fetch() as $value) {
             $NOVOTE = $value;
            }
            
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
          echo'
          <div class="card" style="width: 18rem;">
          <div class="card-body">
          <h5 class="card-title">'.$this->vraagstelling.'</h5>
          <p class="card-text">'.$YESVOTE.'<button class="btn btn-success" disabled="disabled"><a href="?action=Eens" class="btn btn-success">Eens</a></button>
          <button class="btn btn-danger" disabled="disabled"><a href="?action=Oneens" class="btn btn-danger">Oneens</a></button>'.$NOVOTE.'</p>
          </div>
          </div>
          ';

    }


}