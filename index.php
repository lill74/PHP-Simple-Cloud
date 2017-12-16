<?php
session_start();
if(isset($_SESSION["login"]))
{
if($_SESSION["login"]  == "true") {
    echo '<script type="text/javascript">
           window.location = "console.php"
      </script>';
}
}
?>

<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="lib/css/index_style.css"/>

<div class="container">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">로그인</h3>
                </div>
                <div class="panel-body">
                    <form ame="signup_form" method="post" action="manage/login.php">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="아이디" name="id" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="비밀번호" name="password" type="password" value="">
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="로그인">
                    </fieldset>
                    </form>
                </div>
</div>
