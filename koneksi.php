<?php 
session_start();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'cwabali_email';

$db = new PDO("mysql:host=$dbhost; dbname=$dbname; charset=utf8", $dbuser, $dbpass);



 ?>