<?php
/*
file path:   http://localhost/projects/demo%20database/PHP/login.php
*/
?>
<?php
if(isset($_POST["submit"]))
{
$username=$_POST["user"];
$password=$_POST["pass"];
$u_fname=$u_mname=$u_lname=$u_gender=$u_dob=$u_mobile=$u_email=$u_address=$u_city=$u_state=$u_country="Not mentioned";
require "db_connection.php";
$pre_query1="SELECT * from user WHERE email='$username'";
$query_opt1=insert_query($conn,$pre_query1);
$val_array1=mysqli_fetch_assoc($query_opt1);
$rows1=mysqli_num_rows($query_opt1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database</title>
	<link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>
<body>
<?php
if($rows1)
{
	$pre_query2="SELECT * FROM user WHERE email='$username' AND mobile='$password'";
	$query_opt2=insert_query($conn,$pre_query2);
	$val_array2=mysqli_fetch_assoc($query_opt2);
	$rows2=mysqli_num_rows($query_opt2);
	if($rows2)
	{
		$u_fname=$val_array2["userfname"];
		$u_name=$val_array2["usermname"];
		$u_lname=$val_array2["userlname"];
		$u_gender=$val_array2["gender"];
		$u_dob=$val_array2["dob"];
		$u_mobile=$val_array2["mobile"];
		$u_email=$val_array2["email"];
		$u_address=$val_array2["address"];
		$u_city=$val_array2["city"];
		$u_state=$val_array2["state"];
		$u_country=$val_array2["country"];
		?>
	<p class="text30px">YOUR DATABASE DETAILS ARE</p>
			<table class="table" align="center">
		<tr class="tabler">
			<th class="tableh">
				First Name:
			</th>
			<td class="tablec">
				<?php echo $u_fname; ?>
			</td>
		</tr>
		<tr class="tabler">
			<th class="tableh">
				Middle Name:
			</th>
			<td class="tablec">
				<?php echo $u_mname; ?>
			</td>
		</tr>
		<tr class="tabler">
			<th class="tableh">
				Last Name:
			</th>
			<td class="tablec">
				<?php echo $u_lname; ?>
			</td>
		</tr>
		<tr class="tabler">
			<th class="tableh">
				Gender:
			</th>
			<td class="tablec">
				<?php echo $u_gender; ?>
			</td>
		</tr>
		<tr class="tabler">
			<th class="tableh">
				DOB:
			</th>
			<td class="tablec">
				<?php echo $u_dob; ?>
			</td>
		</tr>
		<tr class="tabler">
			<th class="tableh">
				Mobile:
			</th>
			<td class="tablec">
				<?php echo $u_mobile; ?>
			</td>
		</tr>
		<tr class="tabler">
			<th class="tableh">
				Email:
			</th>
			<td class="tablec">
				<?php echo $u_email; ?>
			</td>
		</tr>
		<tr class="tabler">
			<th class="tableh">
				Address:
			</th>
			<td class="tablec">
				<?php echo $u_address; ?>
			</td>
		</tr>
		<tr class="tabler">
			<th class="tableh">
				City:
			</th>
			<td class="tablec">
				<?php echo $u_city; ?>
			</td>
		</tr>
		<tr class="tabler">
			<th class="tableh">
				State:
			</th>
			<td class="tablec">
				<?php echo $u_state; ?>
			</td>
		</tr>
		<tr class="tabler">
			<th class="tableh">
				Country:
			</th>
			<td class="tablec">
				<?php echo $u_country; ?>
			</td>
		</tr>   
	</table>
	</body>
</html>
<?php	
}
}
}
else
{
	?>
	<script type="text/javascript">
		alert("Go to main page");
	</script>
	<a href="index.php">Go to main page</a>
	<?php
}
?>