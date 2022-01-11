<?php
 session_start();
 
$server ="localhost";
$dbName ="module";
$dbUser ="root";
$dbPassword ="";

$con = mysqli_connect($server,$dbUser,$dbPassword,$dbName);

if($con){
   
}else {
    die("Error:".mysqli_connect_error());
}

?>