<?php
session_start();ob_start(); 
$host='localhost';
$name1='root';
$pass='';
$database='a_database';
$link=mysqli_connect($host,$name1,$pass,$database);

?>