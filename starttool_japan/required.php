<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 include_once("config.php");

if($_SERVER['REQUEST_METHOD']=='GET'){

//$encrypted=$_GET['d1']; 
$password = '8R@13#s34Af';
echo "$password";

}
?>