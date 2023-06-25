<?php 
require_once __DIR__."/../main-function.php";

function getAllRw(){
	global $conn;
	$query = "SELECT * FROM rw";
	return query($query);
}

?>