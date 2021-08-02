<?php
include 'app/user/user.php';


include 'app/user/controller/auth.php' ;
include '/user/auth/create-token' ;

var_dump((explode( '/', $_SERVER['REQUEST_URI'] )));

$uri = explode( '/', $_SERVER['REQUEST_URI'] );


$module = $uri[1];
$controller = $uri[2];
$action = $uri[3];

var_dump($action);
echo 'ПОПАЛ';