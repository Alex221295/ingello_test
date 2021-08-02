<?php
include 'app/user/user.php';


include 'app/user/controller/auth.php' ;
include '/user/auth/create-token' ;

var_dump((explode( '/', $_SERVER['REQUEST_URI'] )));

$s = explode( '/', $_SERVER['REQUEST_URI'] );


var_dump($s);

var_dump($_SERVER);


echo 'ПОПАЛ';