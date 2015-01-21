<?php
	session_start();
	if($_SESSION['user']){
	}
	else{
		header("location:index.php");
	}
	if($_SERVER['REQUEST_METHOD'] = "POST") 
	{
		$details = mysql_real_escape_string($_POST['details']);
		$time = strftime("%X");
		$date = strftime("%B %d, %Y");
		$decision ="no";
		mysql_connect("localhost", "fdb_user","1234") or die(mysql_error()); 
		mysql_select_db("first_db") or die("Cannot connect to database");
		foreach($_POST['public'] as $each_check) 
 		{
 			if($each_check !=null ){ 
 				$decision = "yes"; 
 			}
 		}
		
		mysql_query("INSERT INTO list (details, date_posted, time_posted, public) VALUES ('$details','$date','$time','$decision')"); //SQL query
		header("location: home.php");
	}
	else
	{
		header("location:home.php"); 
	}
?>