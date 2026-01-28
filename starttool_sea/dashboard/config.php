<?php
/* turn on verbose error reporting (15) to see all warnings and errors */

ini_set("post_max_size", "10M");
ini_set("log_errors" , "1");
ini_set("error_log" , "Errors_log.txt");
ini_set("display_errors" , "0");
error_reporting(E_ALL);
error_reporting(E_ALL ^ E_NOTICE);
@session_start();

/*
$dbhost = "localhost";
$dbname = "starttool";
$dbuser = "root";
$dbpass = "Password";//Set Databse Password here
*/


$dbhost = "10.173.137.134";
$dbname = "starttool_sea";
$dbuser = "startconnect";
$dbpass ="@CCENTURE@123#";

//"@CCENTURE@123#";
//Set Databse Password here


$link = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}
?>