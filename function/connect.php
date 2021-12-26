<?php
try
{
$connect=new PDO("mysql:host=localhost;dbname=library","root","");
$connect->query("Set character set utf8");
}
catch(PDOException $error)
{
	echo "error";	
}
?>