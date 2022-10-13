<?php
function getConnection()
{

		$db= new PDO('mysql:host=localhost;dbname=gedibsc;charset=utf8',"root","");
		return $db;
	
}