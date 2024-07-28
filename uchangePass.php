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
        <h3 id="heading">Change Password </h3>
     <div id="center">
	 <?php
	    if(isset($_POST["submit"]))
		{
            $sql="SELECT * from student WHERE PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
			$res=$db->query($sql);
			if($res->num_rows>0)
            {
				$s="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
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
