<?php

require "user.class.php";
require 'card.class.php';
include "DBconfig.php";


if (!isset($_COOKIE['user'])) {
    $user = new user();
    $user->createUserId();
}
else{
    $userid = $_COOKIE['user'];
    $user = new user();
    $user->setUser($userid);
}

if (!$user->checkUserIdInDB()) {
    $user->setUserIdInDB();
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Poll</title>
</head>
<body>
    
<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>Poll</h1>
  <p></p> 
</div>
<div class="container mt-5">
<div class="text-center">
    <?php
$card = new card();
$card->setCard();
$card->getCard();
    ?>
</div>
</div>
</body>
</html>
