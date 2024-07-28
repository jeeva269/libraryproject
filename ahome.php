<?php
session_start();
include "databases.php";
function countRecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
}

if(!isset($_SESSION["AID"]))
{
	header("location:alogin.php"); 
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
        <h3 id="heading">Welcome Admin</h3>
        <div id="center">
	        <ul class="record">
			    <li>Total Students : <?php echo countRecord("select * from student ",$db); ?></li>
				
				<li>Total Books    : <?php echo countRecord("select * from book",$db); ?></li>
				
				<li>Total Request  : <?php echo countRecord("select * from request",$db); ?></li>
				
				<li>Total Comments : <?php echo countRecord("select * from comment",$db); ?></li>                            
			</ul> 	
        </div>
    </div>
    <div id="navi">
        <?php 
		    include "adminsidebar.php";
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

