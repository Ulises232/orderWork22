<?php
include 'db_connect.php';
$id = explode("/", $_GET['page'])[2];
$qry = $conn->query("SELECT * FROM clientes where id_cliente = ".$id)->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'clients_new.php';
?>