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
        <h3 id="heading">Search Book</h3>
     <div id="center">
	 
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <lable>Enter Book Name Or Keywords</lable>	
            <input type="text" required name="name">
            <button type="submit" name="submit">Search Now</button>
		</form>	
     </div>	
        <?php
		if(isset($_POST["submit"]))
		{
			
             $sql="SELECT * FROM book where BTITLE like '%{$_POST["name"]}%' OR keywords like '%{$_POST["name"]}%'";          
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				echo "<table>
				    <tr>
					     <th>SNO</th>
						 <th>BOOK NAME</th>
						 <th>KEYWORDS</th>
						 <th>VIEW</th>
						 <th>COMMENT</th>
					</tr>
					    ";
						$i=0;
                    while($row=$res->fetch_assoc())
					{
						$i++;
						echo "<tr>";
						echo "<td>{$i}</td>";
						echo "<td>{$row["BTITLE"]}</td>";
						echo "<td>{$row["KEYWORDS"]}</td>";
						echo "<td><a href='{$row["FILE"]}' target='_blank'>View</a></td>";
						    echo "<td><a href='comment.php?id={$row["BID"]}'>Go</a></td>";
						echo "</tr>";
					}		
 						echo "</table>";
			} 
            else
            {
                echo "<p class='error'>No Books Records Found</p>";
            }
		}			
        ?>		   	 
    </div>
     <div id="navi">
        <?php 
		    include "usersidebar.php";
		?> 
     </div>
    <div>
        <div id="footer">
            <p>copyright &copy;  Jeeva LIBRARYZONE 2024</p>
        </div>
    </div>
</div>
</body>
</html>
