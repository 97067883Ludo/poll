<?php

require "user.class.php";
include "DBconfig.php";


if (!isset($_COOKIE['user'])) {
    $user = new user();
    $user->createUser();
    echo $user->getid();
}else {
$userid = $_COOKIE['user'];
$user = new user();
$user->setUser($userid);
echo $user->getid();

}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
    <title>Poll</title>
</head>
<body>
    
<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>Poll</h1>
  <p></p> 
</div>
</body>
</html>
