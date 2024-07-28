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
        <h3 id="heading">View Comments Details</h3>
        <?php
            $sql="select book.BTITLE,student.NAME,comment.COMM,comment.LOGS from comment
			inner join book on book.BID=comment.BID inner join student 
			on comment.SID=student.ID";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				echo "<table>
				    <tr>
					    <th>SNO</th>
						<th>BOOK</th>
						<th>NAME</th>
						<th>COMMENT</th>
						<th>LOGS</th>
					</tr>
					    ";
						$i=0;
                    while($row=$res->fetch_assoc())
					{
						$i++;
						echo "<tr>";
						echo "<td>{$i}</td>";
						echo "<td>{$row["BTITLE"]}</td>";
						echo "<td>{$row["NAME"]}</td>";
						echo "<td>{$row["COMM"]}</td>";
						echo "<td>{$row["LOGS"]}</td>";
						echo "</tr>";
					}		
 						echo "</table>";
			} 
            else
            {
                echo "<p class='error'>No Comment Found</p>";
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
