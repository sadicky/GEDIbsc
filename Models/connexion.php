<?php
function getConnection(){
	$db=new PDO("mysql:host=localhost;dbname=gedibsc","root","");
	return $db;
}

?>