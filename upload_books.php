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
        <h3 id="heading">Upload Books </h3>
     <div id="center">
	 <?php
	    if(isset($_POST["submit"]))
		{
            $target_dir="upload/";
            $target_file=$target_dir.basename($_FILES["efile"]["name"]);
			if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
			{
				$sql="insert into book(BTITLE,KEYWORDS,FILE) values ('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
				$db->query($sql);
				echo "<p class='success'>Book Uploaded success</p>";
			}
			else
			{
				echo "<p class='error'>Error In Upload</p>";
			}  			
        }			
	 ?>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
		    <lable>Book Title</lable>
            <input type="text" name="bname" required>	
            <lable>Keyword</lable>
			<textarea name="keys" required></textarea>
			<label>Upload File</label>
			<input type="file" name="efile" required>
            <button type="submit" name="submit">Update Book</button>
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
