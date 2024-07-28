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
        <h3 id="heading">New Book Request</h3>
     <div id="center">
	 <?php
	    if(isset($_POST["submit"]))
		{
            $sql="insert into request (ID,MES,LOGS) values ({$_SESSION["ID"]},'{$_POST["mess"]}',now())";
			$db->query($sql);
		    echo "<p class='Success'>Request Sent Admin</p>";
           				
        }			
	 ?>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <lable>Message</lable>	
            <textarea required name="mess"></textarea>
            <button type="submit" name="submit">Sent Message</button>
 		
     </div>		
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
