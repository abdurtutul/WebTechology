<?php
session_start();
if(! isset($_SESSION['username']))
{
	header("Location: login.php");

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome</title>
</head>
<body>
	<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
	<br><br>
	<a href="Logout.php">Logout</a>

</body>
</html>