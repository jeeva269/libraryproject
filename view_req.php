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
        <h3 id="heading">View Book Details</h3>
        <?php
            $sql="SELECT STUDENT.NAME,request.MES,request.LOGS From STUDENT inner join request on STUDENT.ID=request.ID";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				echo "<table>
				    <tr>
					     <th>SNO</th>
						 <th>NAME</th>
						 <th>MES</th>
						 <th>LOGS</th>
					</tr>
					    ";
						$i=0;
                    while($row=$res->fetch_assoc())
					{
						$i++;
						echo "<tr>";
						echo "<td>{$i}</td>";
						echo "<td>{$row["NAME"]}</td>";
						echo "<td>{$row["MES"]}</td>";
						echo "<td>{$row["LOGS"]}</td>";
						echo "</tr>";
					}		
 						echo "</table>";
			} 
            else
            {
                echo "<p class='error'>No Request Records Found</p>";
            }				
        ?>		
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
