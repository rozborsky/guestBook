<?php
$adminemail="admin@site.ru"; 
 
$date=date("d.m.y");
$time=date("H:i");
 
$backurl="index.php";

 
$name=$_POST['name']; 
$email=$_POST['email'];
$homePage=$_POST['homePage'];
$msg=$_POST['message']; 

require_once( "DbManager.php" );

$obj = new DbManager;
$obj->connect('rrrrr', 'email', 'homePage', '11-05-05 10:10:10', 'text');
 
?>