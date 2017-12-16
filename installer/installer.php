<?php
$mysqli = new mysqli($_POST['host'], $_POST['dbuser'], $_POST['dbpass'], $_POST['dbname']);

$sql = "CREATE TABLE file (
name int(20),
realname varchar(150),
date date,
share int(1) not null default 0
)
";

$sql2 = "CREATE TABLE user (
id varchar(20),
pass varchar(100)
)
";

$mysqli->query($sql);
$mysqli->query($sql2);

 $hash = password_hash($_POST['dbpass'], PASSWORD_DEFAULT); 
 $id = $_POST["dbuser"];
 echo ($hash);

 $q = "INSERT INTO user (id,pass) VALUES ('$id', '$hash')";
               $mysqli->query($q);

$mysqli->close();

?>