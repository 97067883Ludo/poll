<?php
require 'user.class.php';


$MAC = exec('getmac');

$MAC = strtok($MAC, " ");

$user = new user($MAC);

echo $user->getmac();

?>