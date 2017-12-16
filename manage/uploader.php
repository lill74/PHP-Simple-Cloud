<?php
session_start();
if(!isset($_SESSION["login"]))
{
      echo '<script type="text/javascript">
           window.location = "../index.php"
      </script>';
}

if($_SESSION["login"]  != "true") {
    echo '<script type="text/javascript">
           window.location = "../index.php"
      </script>';
}
?>

<script src="../lib/js/jquery.js"></script>
<script src="../lib/js/jquery_form.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile"><br>
    <input type="submit" value="업로드">
</form>

<div class="progress">
    <div class="bar"></div >
    <div class="percent">0%</div >
</div>

<div id="status"></div>

<script>
$(function() {

    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');

    $('form').ajaxForm({
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
        }
    });
});
</script>