<?php
include("../config.php");
if(isset($_SESSION["login"]))
{
if($_SESSION["login"]  == "true") {
	$id = $_GET["id"];
$q = "DELETE FROM file WHERE name = $id";
$result = $mysqli->query($q);
$mysqli->close();

if ($result==false) {
    echo("삭제 실패");
}
else {
   unlink($datadir . "/" . $id);
   echo("삭제 성공");
}

}
}

?>