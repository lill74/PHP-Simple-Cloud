<?php
include("../config.php");
if(isset($_SESSION["login"]))
{
if($_SESSION["login"]  == "true") {
	$id = $_GET["id"];

$q1 = "SELECT  * FROM file WHERE name = $id";
$result1 = $mysqli->query($q1);
$data = $result1->fetch_array();
if($data["share"] == 0)
{
	$share = 1;
}
else
{
	$share = 0;
}

$q = "UPDATE  file SET share='$share' WHERE name = $id";
$result = $mysqli->query($q);

$mysqli->close();

if ($result==false) {
    echo("수정 실패");
}
else {
   echo("수정 성공");
}

}
}

?>