<?php
include("../config.php");
$id = $_GET["id"];
$q = "SELECT * FROM file WHERE name = $id";
$result = $mysqli->query($q);
$data = $result->fetch_array();
$mysqli->close();

$filepath = $datadir . "/" . $data["name"];
$filesize = filesize($filepath);
$path_parts = pathinfo($filepath);
$filename = $data["realname"];	
$extension = $path_parts["extension"];

if($data["share"] == 0)
{	
  if(isset($_SESSION["login"])) {
  if($_SESSION["login"]  == "true") {
	download($filename,$filesize,$filepath);
}
}
}
else
{
	download($filename,$filesize,$filepath);
}

echo ("비정상적인 접근입니다");

function download($filename,$filesize,$filepath)
{
header("Pragma: public");
header("Expires: 0");
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: $filesize");

ob_clean();
flush();
readfile($filepath);

echo "다운로드 성공";
}

?>