<?php
include('config.php');
if(!isset($_SESSION["login"]))
{
      echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
}

if($_SESSION["login"]  != "true") {
    echo '<script type="text/javascript">
           window.location = "index.php"
      </script>';
}
?>

<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="lib/css/console_style.css"/>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">클라우드</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
        <a class="nav-link" href="manage/uploader.php">업로드</a>
        <a class="nav-link" href="manage/logout.php">로그아웃</a>
  </div>
</nav>

<?php
$q = "SELECT * FROM file";
$result = $mysqli->query($q);
$total_record = $result->num_rows;

if( isset($page) ) {
    $now_page = $page;
}
else {
    $now_page = 1;
}


$record_per_page = 5;

$start_record = $record_per_page*($now_page-1);
$record_to_get = $record_per_page;

if( $start_record+$record_to_get > $total_record) {
  $record_to_get = $total_record - $start_record;
}

$q1 = "SELECT * FROM file WHERE 1 ORDER BY name DESC LIMIT $start_record, $record_to_get";
$result = $mysqli->query($q1);
?>

<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>이름</th>
        <th>날짜</th>
        <th>공유</th>
        <th>행동</th>
      </tr>
    </thead>
    <tbody>
    <?php while($data = $result->fetch_array()) :?>
    <tr>
        <td><?php echo $data['realname']?></td>
        <td><?php echo $data['date']?></td>
        <td><?php echo $data['share']?></td>
        <td><div class="btn-group" role="group" aria-label="...">
        <a href="manage/edit.php?id=<?php echo $data['name']; ?>" class="btn btn-link" role="button">수정</a>   
<a href="manage/delete.php?id=<?php echo $data['name']; ?>" class="btn btn-link" role="button">삭제</a>
<a href="manage/download.php?id=<?php echo $data['name']; ?>" class="btn btn-link" role="button">다운로드</a>
</div></td>
    </tr>
    
<?php endwhile ?>
    </tbody>
  </table>
</div>