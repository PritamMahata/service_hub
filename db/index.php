<?php
$db="service_hub";
$user="root";
$password="";
$server="localhost";
$port="3306";
try{
    $con=mysqli_connect($server,$user,$password,$db,$port);
}catch(Exception $e){
    echo $e->getMessage();
}
?>