<?php 
header("Content-Type: application/json; charset=UTF-8");
require_once "../core/base.php";
require_once "../core/functions.php";

$sql = "SELECT * FROM categories WHERE 1";
if(isset($_GET['id'])){
    $id = text_filter($_GET['id']);
    $sql = "SELECT * FROM categories WHERE id='$id'";
}
if(isset($_GET['limit'])){
    $limit = text_filter($_GET['limit']);
    $sql .= " LIMIT $limit";
}
if(isset($_GET['offset'])){
    $offset = text_filter($_GET['offset']);
    $sql .= " OFFSET $offset";
}


$rows = [];
$query = mysqli_query(con(),$sql);
while($row = mysqli_fetch_assoc($query)){
    $arr = [
        'id' => $row['id'],
        'title' => $row['title'],
        'created_at' => $row['created_at'],
    ];
    array_push($rows,$arr);
}
apiOutput($rows);