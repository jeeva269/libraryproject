<?php
session_start();
include "databases.php";
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
        <h3 id="heading">Change Password </h3>
     <div id="center">
	 <?php
	    if(isset($_POST["submit"]))
		{
            $sql="SELECT * from admin WHERE APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
			$res=$db->query($sql);
			if($res->num_rows>0)
            {
				$s="update admin set APASS='{$_POST["npass"]}' WHERE AID=".$_SESSION["AID"];
				$db->query($s);
				echo "<p class='Success'>Password Changed Successfully</p>";
			}
            else
			{
				echo "<p class='error'>Invalid Password</p>";
			}				
        }			
	 ?>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		    <lable>Old Password</lable>
            <input type="password" name="opass" required>	
            <lable>New Password</lable>	
            <input type="password" name="npass" required>
            <button type="submit" name="submit">Update Password</button>
 		</form>
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
