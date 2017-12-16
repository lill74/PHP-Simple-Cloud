<?php
require_once('../config.php');
$q = "SELECT * FROM file";
$result = $mysqli->query($q);
$total_record = $result->num_rows;
echo ( "파일 갯수: " . $total_record . " 개");

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

<table class="table">
    <thead>
        <th>파일 아이디</th>
        <th>파일이름</th>
    </thead>
<?php while($data = $result->fetch_array()) :?>
    <tr>
        <td><a href="download.php?id=<?php echo $data['name']; ?>"><?php echo $data['name']?></td>
        <td><?php echo $data['realname']?></td>
    </tr>
    
<?php endwhile ?>
</table>
