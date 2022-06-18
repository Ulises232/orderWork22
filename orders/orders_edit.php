<?php
include 'db_connect.php';
$id = explode("/", $_GET['page'])[2];
$qry = $conn->query("SELECT * FROM ordenes where folio = ".$id)->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'orders_new.php';
?>