<?php 
// file path:    http://localhost/projects/demo%20database/PHP/db_connection.php
$db_u_name="root";
$db_u_host="localhost";
$db_u_pwd="";
$db_u_db="practise1";
$conn=mysqli_connect($db_u_host,$db_u_name,$db_u_pwd,$db_u_db);
function insert_query($f_conn,$f_query)
{
  return mysqli_query($f_conn,$f_query);
}
function close_database($f_conn)
{
	mysqli_close($f_conn);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database</title>
	<style type="text/css">
		body{
		background-color:black;
		color: white;
		text-align: center;
		font-family: Arial;
		}
		.link
		{
			text-decoration: none;
			font-size: 20px;
			color: white;
		}
	</style>
</head>
<body>

</body>
</html>