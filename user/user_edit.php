<?php
include 'db_connect.php';
$id = explode("/", $_GET['page'])[2];
$qry = $conn->query("SELECT * FROM users where id = ".$id)->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'user_new.php';
?>