<?php
include "databases.php";	 
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
        <h3 id="heading">New User Registration</h3>
     <div id="center">
	 <?php
	    if(isset($_POST["submit"]))
		{
          
				$sql="insert into student(NAME,PASS,MAIL,DEP) values ('{$_POST["name"]}',
				'{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
				$db->query($sql);
				echo "<p class='success'>User Registration success</p>";
					
        }			
	 ?>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
		    <lable>Name</lable>
            <input type="text" name="name" required>	
            <lable>Password</lable>
			<input type="password" name="pass" required>
			<label>Email ID</label>
			<input type="email" name="mail" required>
			<select name="dep" required>
			    <option value="">Select</option>
				<option value="BCA">BCA</option>
				<option value="B.SC CS">B.SC CS</option>
				<option value="MCA">MCA</option>
				<option value="OTHERS">OTHERS</option>
			</select> 	
            <button type="submit" name="submit">Register Now </button>
        </form>			
     </div>		
    </div>
     <div id="navi">
        <?php 
		    include "sidebar.php";
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
