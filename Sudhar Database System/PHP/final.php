<!--    COMMENTS
file path:  http://localhost/projects/demo%20database/PHP/final.php
-->
<?php
if(isset($_POST["main_submit"]))
{


				$n_error=$m_error=$e_error="";
				$nflag=$mflag=$eflag=0;
				$u_fname=$u_mname=$u_lname=$u_gender=$u_dob=$u_mobile=$u_email=$u_address=$u_city=$u_state=$u_country="Not mentioned";
				function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
				}
				function validate_mobile($mobile)
				{
				    return preg_match('/^[0-9]{10}+$/', $mobile);
				}
				function name_validate($name_val)
				{
					return preg_match("/^[a-zA-Z ]*$/",$name_val);
					//returns 1 if correct
				}
				if(!empty($_POST["u_fname"]))
				{
					if(name_validate($_POST["u_fname"]))
				{
					$u_fname=test_input($_POST["u_fname"]);
					$nflag=1;
				}
				else
				{
					$u_fname="";
					$n_error="Invalid Name";
				}
				}
				if(!empty($_POST["u_mname"]))
				{
					if(name_validate($_POST["u_mname"]))
				{
					$u_mname=test_input($_POST["u_mname"]);
				}
				}
				if(!empty($_POST["u_lname"]))
				{
					if(name_validate($_POST["u_lname"]))
				{
					$u_lname=test_input($_POST["u_lname"]);
				}
				}
				if(!empty($_POST["u_gender"]))
				{
					$u_gender=$_POST["u_gender"];
				}
				if(!empty($_POST["u_dob"]))
				{
					$u_dob=$_POST["u_dob"];
				}
				if(!empty($_POST["u_mobile"]))
				{
						if(validate_mobile($_POST["u_mobile"]))
					{
						$u_mobile=$_POST["u_mobile"];
						$mflag=1;
					}
					else if(!validate_mobile($_POST["u_mobile"]))
					{
						$u_mobile="";
						$m_error="Invalid Mobile Number";
					}
				}
				if(!empty($_POST["u_email"]))
				{
					if (filter_var($_POST["u_email"],FILTER_VALIDATE_EMAIL)) 
					{
				      $u_email = $_POST["u_email"];
				      $eflag=1;
				    }
				    else if(!filter_var($_POST["u_email"],FILTER_VALIDATE_EMAIL))
				    {
				    	$u_emailI="Invalid Email";
				    }
				}
				if(!empty($_POST["u_address"]))
				{
					$u_address=test_input($_POST["u_address"]);
				}
				if(!empty($_POST["u_city"]))
				{
					$u_city=test_input($_POST["u_city"]);
				}
					if(!empty($_POST["u_state"]))
				{
					$u_state=test_input($_POST["u_state"]);
				}
				if(!empty($_POST["u_country"]))
				{
					$u_country=test_input($_POST["u_country"]);
				}
				require "db_connection.php";
	$pre_query1="SELECT * from user WHERE email='$u_email'";
	$query_opt1=insert_query($conn,$pre_query1);
	$val_array1=mysqli_fetch_assoc($query_opt1);
	$rows1=mysqli_num_rows($query_opt1);
			if($rows1)
				{
					?>
					<style type="text/css">
					body
					{
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
						alert("Data already exists please login");
					</script>
					<a class="link" href="index.php">Go to Home page</a>
					<?php
				}
			else
				{
					?>
					<!DOCTYPE html>
					<html>
					<head>
						<title>Database</title>
						<link rel="stylesheet" type="text/css" href="../CSS/final.css">
					</head>
					<body>
						<p class="text40px">Thank you</p>
						<p class="text30px">Following are your details</p>
						<table class="table" align="center">
							<tr class="tabler">
								<th class="tableh">
									First Name:
								</th>
								<td class="tablec">
									<?php echo $u_fname.'<span style="color:red;">'.$n_error."</span>"; ?>
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
									<?php echo $u_mobile.'<span style="color:red;">'.$m_error."</span>"; ?>
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
					<?php
					if($nflag and $mflag and $eflag)
						{
								//require "db_connection.php";
								$insert_query1="INSERT INTO user(userfname,usermname,userlname,gender,dob,mobile,email,address,city,state,country) VALUES('$u_fname','$u_mname','$u_lname','$u_gender','$u_dob','$u_mobile','$u_email','$u_address','$u_city','$u_state','$u_country');";
								insert_query($conn,$insert_query1);
								close_database($conn);
								echo '<span  style="font-size:30px;color:green;">'."YOUR DETAILS HAVE BEEN STORED IN DATABASE"."</span>";
						}
					else if(!($nflag and $mflag and $eflag))
						{
							echo '<span style="font-size:30px;color:red;">'."WE COULD NOT STORE YOUE DETAILS IN DATABASE"."</span>";
						}
						?>
						<br><a class="link" href="index.php">Home Page</a><br><br>
						<?php
			}
}
else 
	{
		?>
	<br><br><script type="text/javascript">
		alert("Go to Home page First");
	</script>
	<a class="link" href="index.php">Go to Home Page</a>
	<?php
	}
?>
</body>
</html>