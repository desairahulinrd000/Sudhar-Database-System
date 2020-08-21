<!DOCTYPE html>
<html>
<head>
	<title>DataBase</title>
	<link rel="stylesheet" type="text/css" href="../CSS/index.css">
	<style type="text/css">
		*
		{
			color:white;
		}
	</style>
</head>
<body>
	<?php
if(isset($_POST["submit"]))
{
	$username=$_POST["user"];
	$password=$_POST["pass"];
	require "db_connection.php";
	$pre_query1="SELECT * from user WHERE email='$username' AND mobile='$password'";
	$query_opt1=insert_query($conn,$pre_query1);
	$val_array1=mysqli_fetch_assoc($query_opt1);
	$rows1=mysqli_num_rows($query_opt1);
	if($rows1)
	{
		$pre_query2="DELETE FROM user WHERE email='$username'";
		$query_opt2=insert_query($conn,$pre_query2); 
		?>
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
				<br><br><script type="text/javascript">
					alert("Thank You Data Deleted successfully");
				</script>
				<a class="link" href="index.php">Go to Home page</a>
				<?php
	}
	else
	{
		?>
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
				<br><br><script type="text/javascript">
					alert("Invalid Email or Password");
				</script>
				<a class="link" href="index.php">Home page</a>
				<?php
	}
}
else
		{
					?>
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
					<br><br><script type="text/javascript">
						alert("Go to main page");
					</script>
					<a class="link" href="index.php">Go to Login page</a>
					<?php
				}
?>
</body>
</html>