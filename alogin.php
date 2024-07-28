<?php
session_start();
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
        <h3 id="heading">Admin Login Here</h3>
        <div id="center">
		<?php
		    if(isset($_POST["submit"]))
			{    
		       $sql="SELECT * FROM admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
			   $res=$db->query($sql);
			  if($res->num_rows>0)
			  {
				  $row=$res->fetch_assoc();
			      $_SESSION["AID"] =$row["AID"];
                  $_SESSION["ANAME"]=$row["ANAME"];				  
				  header("location:ahome.php");
              }
              else
              {
				  echo "<p class='error'>Invalid User Details</p>";
			  }
			  
			} 
			
		?>
            <form action="alogin.php" method="post">
                <label>Name</label>
                <input type="text" name="aname" required>
                <label>Password</label>
                <input type="password" name="apass" required>
                <button type="submit" name="submit">Login Now</button>
            </form>
        </div>
    </div>
    <div id="navi">
        <?php include "sidebar.php"; ?>
    </div>
    <div>
        <div id="footer">
            <p>copyright &copy; Jeeva LIBRARYZONE 2024</p>
        </div>
    </div>
</div>
</body>
</html>
