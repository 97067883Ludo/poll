<?php
require 'user.class.php';


if (!isset($_COOKIE['userid'])) {
    setcookie('userid', 'userid_test', time()+60*60*24*30, '/');
}else{
echo "de coockie was al geset " . $_COOKIE['userid'];
}
echo "de coockie is nog nooit geset en nu dus wel " . $_COOKIE['userid'];


//$user = new user($MAC);

?>