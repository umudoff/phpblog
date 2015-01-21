<html>
    <head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="bootstrap/css/bootstrap-fluid-adj.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <title>My first PHP Website</title>


    </head>
    <body>

         <div class="navbar navbar-inverse navbar-fixed-top">
        <div class ="navbar-inner">
          <div class="container-fluid">
            <div class="nav-collapse collapse">
              <ul class="nav">
             <li> <a href="index.php">Back</a> </li>
              </li>
            </ul>
            </div>
          </div>
        </div>
      </div>



        <div class="hero-unit">
        
        <div class="container">
       
        <form class="form=signin span4"  action="checklogin.php" method="POST" enctype="multipart/form-data" >
           <h2 class="form-signin-heading">Login Page</h2>
            
           Enter Username: <input type="text" class="input-block-level" placeholder="Username"  name="username" required="required" /> <br/>
           Enter password: <input type="password" class="input-block-level" placeholder="Password"  name="password" required="required" /> <br/>
           <input class="btn btn-primary" type="submit" value="Login"/>
        </form>
         </div>
        </div>



        <script src="bootstrap/js/jquery-2.0.3.min.js"></script>
       <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>