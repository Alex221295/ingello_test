<?php
include 'app/user/user.php';

$token = new Token();
$token->createToken();


echo 'ПОПАЛ';