<?php
	
	//Essas informações são do meu server local pra teste.
	//Estou usando o XAMPP caso queiram criar um server local.

	//Database Information 
	$username = "root";
	$password = "";
	$host = "localhost";
	$dbname = "na_main";

	//Comunicate using UTF8
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 

	try {
		$db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
	} catch (PDOException $ex) {
		die("Failed to connect to the database.");
	}
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	
	header('Content-Type: text/html; charset=utf-8'); 
	session_start(); 