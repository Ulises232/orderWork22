<?php
include 'db_connect.php';
$id = explode("/", $_GET['page'])[2];
$qry = $conn->query("SELECT * FROM materiales where id_material = ".$id)->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'materials_new.php';
?>