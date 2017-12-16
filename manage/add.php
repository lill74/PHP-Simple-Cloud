<?php
include('../config.php');
if(isset($_SESSION["login"]))
{
if($_SESSION["login"]  == "true") {

$id = $_GET["id"];
$pass = $_GET["pass"];
 $hash = password_hash($pass, PASSWORD_DEFAULT); 

 echo ($hash);

 $q = "INSERT INTO user (id,pass) VALUES ('$id', '$hash')";
               $mysqli->query($q);
               $mysqli->close();
           }
       }
?>