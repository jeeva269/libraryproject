<?php
session_start();
include "databases.php";
if(!isset($_SESSION["ID"]))
{
	header("location:uLogin.php"); 
}	
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>jeeva libaray</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<style>
body {
   background-image:url('bg.jpg');
   background-repeat:no-repeat;
   background-attachment: fixed;
   background-size: 100% 100%;
  
}
</style>
<div id="container">
    <div id="header">
        <h1>E-Library Management System</h1>
    </div>
    <div id="wrapper">   
        <h3 id="heading">Welcome <?php echo $_SESSION["NAME"];?></h3>
		
        <p><b><h3> New user, new beginnings !
                  "Welcome, <?php echo $_SESSION["NAME"];?> Your journey with us start's now."
				  A warm welcome to our newest member! We're excited to have you here.
				  Welcome to Jeeva's "[E-LIBRARYZONE]" family.
				  Explorer of books and ideas,Let's make great things happen together.
				  Let start your future journey...
	    </b></h3></p>
      
    </div>
    <div id="navi">
        <?php 
		    include "usersidebar.php";
		?> 
    </div>
    <div>
        <div id="footer">
            <p>copyright &copy; Jeeva LIBRARYZONE 2024</p>
        </div>
    </div>
</div>
</body>
</html>

