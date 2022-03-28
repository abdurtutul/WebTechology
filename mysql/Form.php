<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form</title>
</head>
<body>

	<h1>php-validation</h1>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			$servername = "localhost";
	        $username = "username";
	        $password = "";

			$fname = filter_var($_POST['firstname']);
			$lname = filter_var($_POST['lastname']);
			$gname = filter_var($_POST['Gender']);
			$rname = filter_var($_POST['Religion']);
			$pname = tfilter_varest($_POST['address1']);
			$pename = filter_var($_POST['address2']);
			$pphone = filter_var($_POST['phone']);
			$uname = filter_var($_POST['username']);
			$pass = filter_var($_POST['pass']);
			$cpass = filter_var($_POST['cpass']);


     	    if ($pass== $cpass)
				{
					 if(empty($fname) or empty($lname) or empty($gname)  or empty($rname) or empty($pname) or empty($pename) or empty($pphone)  or empty($uname) or empty($pass) or empty($cpass)) 
					{
						echo "Please fill up the form properly";
					}

					$conn = new mysqli($servername, $username,$mysql_password);
					if ($mysqli->connect_error) {
						die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
					}
					$sql = "INSERT INTO user_list ('$firstname', '$lastname', '$Gender','$Religion','$Present_Address','$Permanent_Address','$Phone','$username','$password)";
					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
					$conn->close();

					echo "Connected Successfully";

				}
				else{
					echo "Password and confirm password not match";
				}
			}
			else {
				echo "password should max 5 characters";
			}


	?>

	<hr><hr>

	<a href="form.html">Go Back</a>

</body>
</html>