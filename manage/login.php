<?php
session_start();

include('../config.php');
$id = $_POST["id"];
$password = $_POST["password"];

$q = "SELECT * FROM user WHERE id='$id'";
$result = $mysqli->query( $q);
$mysqli->close();

if($result->num_rows==1) {
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if (password_verify($password, $row["pass"])) { 
    	$_SESSION['login'] = 'true';
    	echo '<script type="text/javascript">
           window.location = "../console.php"
      </script>';
    }
    else {
        echo "비밀번호가 틀렸습니다.";
    }

}
else {
	echo("계정이 존재하지 않습니다.");
}

?>