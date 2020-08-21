<!--    COMMENTS
file path:  http://localhost/projects/demo%20database/PHP/delete.php

-->
<!DOCTYPE html>
<html>
<head>
	<title>Database</title>
	<link rel="stylesheet" type="text/css" href="../CSS/index.css">
</head>
<body>
	<form action="cnf_delete.php" class="form1" method="post">
		<h3>Enter Details to Delete</h3>
		<input type="text" name="user" placeholder="Username" required="required"><br>
		<input required type="password" placeholder="Password" name="pass"><br>
		<input id="but" type="submit" name="submit" value="Delete">
		<a class="reg" href="index.php">Home page</a>
	</form>
</body>
</html>
</html>