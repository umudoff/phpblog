<?php
	session_start();  
	if($_SESSION['user']){  
	}
	else{
		header("location:index.php");  
	}
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		mysql_connect("localhost", "fdb_user","1234") or die(mysql_error());  
		mysql_select_db("first_db") or die("Cannot connect to database");  
		$id = $_GET['id'];
		mysql_query("DELETE FROM list WHERE id='$id'");
		header("location: home.php");
	}
