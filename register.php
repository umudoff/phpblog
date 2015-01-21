<html>
  <head>
    <title>PHP website</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="bootstrap/css/bootstrap-fluid-adj.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
  </head>
  <body>
   

   <div class="navbar navbar-inverse navbar-fixed-top">
        <div class ="navbar-inner">
          <div class="container-fluid">
            <div class="nav-collapse collapse">
             <ul class="nav">
             <li><a href="index.php">Back</a> </li>
           </ul>
         </div>
       </div>
     </div>
   </div>

   


    <div class="hero-unit">
       
       <div class="container">
    <form class="form-signin span4" action="register.php" method="post" enctype="multipart/form-data" >
      <h2 class="form-signin-heading" >Registration Page</h2>
      Enter Username: <input type="text" class="input-block-level" placeholder="Username"  name="username" required="required"/> <br/>
      Enter Password: <input type="password" class="input-block-level" placeholder="Password"  name="password" required="required" /> <br/>
      <input class="btn btn-primary" type="submit" value="Register"/>
    </form>
  </div>
  </div>
     <script src="bootstrap/js/jquery-2.0.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
    $bool = true;
  mysql_connect("localhost", "fdb_user","1234") or die(mysql_error());  
  mysql_select_db("first_db") or die("Cannot connect to database"); 
  $query = mysql_query("Select * from users");  
  while($row = mysql_fetch_array($query)) 
  {

    $table_users = $row['username']; 

    if($username == $table_users)  
    {
      $bool = false;  
      Print '<script>alert("Username has been taken!");</script>';  
      Print '<script>window.location.assign("register.php");</script>';  
      echo "Username has been taken!";
    }
  }
  if($bool) 
  {
    mysql_query("INSERT INTO users (username, password) VALUES ('$username','$password')");  
    Print '<script>alert("Successfully Registered!");</script>'; 
    Print '<script>window.location.assign("register.php");</script>';  
    echo "Successfully Registered";
  }
}
?>