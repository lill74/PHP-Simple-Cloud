<?php
session_start();
$DB[ 'host' ] = 'localhost';
$DB[ 'db' ] = '';
$DB[ 'id' ] = '';
$DB[ 'pw' ] = '';

$datadir = '../data';
$mysqli = new mysqli($DB[ 'host' ], $DB[ 'id' ] , $DB[ 'pw' ], $DB[ 'db' ]); 
if (mysqli_connect_error()) {
    exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
}


?>