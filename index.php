<html>
    <head>
        <title>My first PHP website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="bootstrap/css/bootstrap-fluid-adj.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">


    </head>
    <body>
        <?php
            echo "<p>Hello World!</p>";
        ?>

     <div class="navbar navbar-inverse navbar-fixed-top">
        <div class ="navbar-inner">
          <div class="container-fluid">
            <div class="nav-collapse collapse">
             <ul class="nav">
             <li><a href="login.php">Sign In</a> </li>
             <li><a href="register.php">Register</a> </li>
             </ul>
              </div>
           </div>  
         </div>
      </div>   



        <script src="bootstrap/js/jquery-2.0.3.min.js"></script>
       <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
    <br/>


   
        <div class="hero-unit">
        <div class="row-fluid">
           
            <h2 align="center">List of the public posts</h2>
            
        </div>
        </div>
    

    <div class="table-responsive">
    <table width="100%" border="1px" class="table">
            <tr>
                <th >Id</th>
                <th>Details</th>
                <th>Post Time</th>
                <th>Edit Time</th>
            </tr>
            <?php
                mysql_connect("localhost", "fdb_user","1234") or die(mysql_error()); //Connect to server
                mysql_select_db("first_db") or die("Cannot connect to database"); //connect to database
                $query = mysql_query("Select * from list Where public='yes'"); // SQL Query
                while($row = mysql_fetch_array($query))
                {
                    Print "<tr>";
                        Print '<td align="center">'. $row['id'] . "</td>";
                        Print '<td align="center">'. $row['details'] . "</td>";
                        Print '<td align="center">'. $row['date_posted']. " - ". $row['time_posted']."</td>";
                        Print '<td align="center">'. $row['date_edited']. " - ". $row['time_edited']. "</td>";
                    Print "</tr>";
                }
            ?>
    </table>
    </div>

</html>