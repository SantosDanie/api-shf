<?php
require __DIR__ . "/JWTHandler.php";
$token = "";
$jwt = new JwtHandler();
$data =  $jwt->decode($token);
var_dump($data);