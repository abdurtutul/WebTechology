<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username === "tutul" and $password === "123456" ){
		$_SESSION['username'] = $username;
		header("Location: Welcome.php");

	}
	else{
		$_SESSION['error_msg'] = "login failed!";
		header("Location: login.php");
	}
	?>


</body>

</body>
</html>