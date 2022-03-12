<?php
session_start();
if(isset($_SESSION['username']))
{
	header("Location: Welcome.php");

}
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
	<form action="LoginAction.php" method="post">


		<label id="username">Username:</label>
		<input type="text" name="username" id="username">
		<br><br>

		<label id="password">Password:</label>
		<input type="password" name="password" id="password">
		<br><br>

		<input type="submit" name="submit" value="Login">
	</form>

<?php 
if(isset($_SESSION['error_msg']))
{
	echo "<p>" . $_SESSION['error_msg'] . "</p>";
}
?>




</body>
</html>
