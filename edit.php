<html>
	<head>
		<title>My first PHP website</title>
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="bootstrap/css/bootstrap-fluid-adj.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <script src="bootstrap/js/jquery-2.0.3.min.js"></script>
       <script src="bootstrap/js/bootstrap.min.js"></script>
	</head>
	<?php
	session_start();  
	if($_SESSION['user']){  
	}
	else{
		header("location:index.php"); 
	}
	$user = $_SESSION['user'];  
	$id_exists = false;
	?>
	<body>


		<h2>Home Page</h2>
		<div class="navbar navbar-inverse navbar-fixed-top">
        <div class ="navbar-inner">
          <div class="container-fluid">
            <div class="nav-collapse collapse">

             <ul class="nav">
              
             <li><a href="logout.php">Logout</a></li>
             <li><a href="home.php">Home</a></li>
             </ul>

             <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php Print "$user"?></a>
            </p>
              </div>
           </div>  
         </div>
      </div>   

		
		<br/><br/>



    



		<div class="hero-unit">
       
            <div class="container">
		<h2 align="center">Currently Selected</h2>
		<table border="1px" width="100%" class="table">
			<tr>
				<th>Id</th>
				<th>Details</th>
				<th>Post Time</th>
				<th>Edit Time</th>
				<th>Public Post</th>
			</tr>
			<?php
				if(!empty($_GET['id']))
				{
					$id = $_GET['id'];
					$_SESSION['id'] = $id;
					$id_exists = true;
					mysql_connect("localhost", "fdb_user","1234") or die(mysql_error()); 
					mysql_select_db("first_db") or die("Cannot connect to database");  
					$query = mysql_query("Select * from list Where id='$id'");  
					$count = mysql_num_rows($query);
					if($count > 0)
					{
						while($row = mysql_fetch_array($query))
						{
							Print "<tr>";
								Print '<td align="center">'. $row['id'] . "</td>";
								Print '<td align="center">'. $row['details'] . "</td>";
								Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
								Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
								Print '<td align="center">'. $row['public']. "</td>";
							Print "</tr>";
						}
					}
					else
					{
						$id_exists = false;
					}
				}
			?>
		</table>
   </div>
</div>



		<?php
		if($id_exists)
		{
		Print '
		<form action="edit.php" method="POST" class="navbar-form pull-left" onsubmit="myFunc();">
			Enter new detail: <input type="text" class="input-block-level"  name="details"/><br/>
			public post? <input type="checkbox" name="public[]" class="input-block-level"  value="yes"/><br/>
			<input type="submit" class="btn btn-primary" value="Update List"/>
		</form>
		';
		}
		else
		{
			Print '<h2 align="center">There is no data to be edited.</h2>';
			 


		}
		?>
	
		<br/>
		
 
            
		


	</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		mysql_connect("localhost", "fdb_user","1234") or die(mysql_error());  
		mysql_select_db("first_db") or die("Cannot connect to database");  
		$details = mysql_real_escape_string($_POST['details']);
		$public = "no";
		$id = $_SESSION['id'];
		$time = strftime("%X"); 
		$date = strftime("%B %d, %Y"); 
		foreach($_POST['public'] as $list)
		{
			if($list != null)
			{
				$public = "yes";
			}
		}
		mysql_query("UPDATE list SET details='$details', public='$public', date_edited='$date', time_edited='$time' WHERE id='$id'") ;
		
		if(isset($_SESSION['id']))
			{
			 header("location:home.php");
				}
	}
?>