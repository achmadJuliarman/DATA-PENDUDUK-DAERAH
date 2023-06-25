<?php 
require_once __DIR__."/../main-function.php";
function getAllRt(){
	$query = "SELECT * FROM rt";
	return query($query);
}
function getRtInRw($rw){
	$query = "SELECT * FROM rt WHERE no_rw = '$rw'";
	return query($query);
}
?>
