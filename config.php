<?php

try{
	$db = new PDO('mysql:host=localhost;dbname=password_hash', 'root', '');
}
catch (PDOException $e){
	die ("Error connecting to database!");
}