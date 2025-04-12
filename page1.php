<?php

echo "testing the page";
// $uname = isset($_COOKIE["name"]) ? $_COOKIE["name"] : "";
// $uemail = isset($_COOKIE["email"]) ? $_COOKIE["email"] : "";
// $upwd = isset($_COOKIE["pwd"]) ? $_COOKIE["pwd"] : "";

session_start();

$uname= $_SESSION["username"];
$uemail= $_SESSION["email"];

echo "the name is " . $uname . " the email is ".$uemail ;

?>