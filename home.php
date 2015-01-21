<html>
  <head>
    <title>My first PHP website</title>
    
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="bootstrap/css/bootstrap-fluid-adj.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
  </head>
  <?php
  session_start();  
  if($_SESSION['user']){  
  }
  else{
    header("location:index.php");  
  }
  $user = $_SESSION['user'];  
  ?>
  <body>
    
 
  <div class="navbar navbar-inverse navbar-fixed-top">
        <div class ="navbar-inner">
          <div class="container-fluid">
            <div class="nav-collapse collapse">

             <ul class="nav">
             <li><a href="logout.php">Logout</a></li>
             </ul>

             <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link"><?php Print "$user"?></a>
            </p>
              </div>
           </div>  
         </div>
      </div>   


<div class="hero-unit">
 <h2 class="center-block">Add Post</h2>

    <br/>
    <div class="container">
    <form   class="navbar-form pull-left" action="add.php" method="POST">
        Add <input type="text" name="details" class="input-block-level" /><br/>
       Public <input type="checkbox" name="public[]" class="input-block-level" value="yes"/><br/>
      <input type="submit" class="btn btn-primary" value="Add to list"/>
    </form>
  </div>
</div>
    <h2 align="center">My list</h2>
    <table border="1px" width="100%" class="table">
      <tr>
        <th>Id</th>
        <th>Details</th>
        <th>Post Time</th>
        <th>Edit Time</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Public Post</th>
      </tr>
      <?php
        mysql_connect("localhost", "fdb_user","1234") or die(mysql_error()); 
        mysql_select_db("first_db") or die("Cannot connect to database"); 
        $query = mysql_query("Select * from list"); 
        while($row = mysql_fetch_array($query))
        {
          Print "<tr>";
            Print '<td align="center">'. $row['id'] . "</td>";
            Print '<td align="center">'. $row['details'] . "</td>";
            Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
            Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
            Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
            Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
            Print '<td align="center">'. $row['public']. "</td>";
          Print "</tr>";
        }
      ?>
    </table>
    <script>

      function myFunction(id)
      {
      var r=confirm("Are you sure you want to delete this record?");
      if (r==true)
        {
          window.location.assign("delete.php?id=" + id);
        }
      }
    </script>
     <script src="bootstrap/js/jquery-2.0.3.min.js"></script>
       <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>