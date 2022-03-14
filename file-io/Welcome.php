<?php
session_start();
if(! isset($_SESSION['currentUser']))
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
	<h1>Welcome,<?php echo $_SESSION['currentUser']; ?></h1>
	<br><br>
	<a href="Logout.php">Logout</a>

</body>
</html>