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

			function test($data) {
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$fname = test($_POST['firstname']);
			$lname = test($_POST['lastname']);
			$gname = test($_POST['Gender']);
			$dob = test($_POST['birthday']);
			$rname = test($_POST['Religion']);
			$pname = test($_POST['address1']);
			$pename = test($_POST['address2']);
			$pphone = test($_POST['phone']);
			$email = test($_POST["email"]);
			$url = test($_POST["url"]);
			$uname = test($_POST['uname']);
            $pass = test($_POST['pass']);
			$cpass = test($_POST['cpass']);
			
			

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
     		$emailErr = "Invalid email format";
     	    }
     	    if(strlen($pass) > 6)
     	    {


     	    if ($pass== $cpass)
				{
					 if(empty($fname) or empty($lname) or empty($gname) or empty($dob) or empty($rname) or empty($pname) or empty($pename) or empty($pphone) or empty($email) or empty($url) or empty($uname) or empty($pass) or empty($cpass)) 
					{
						echo "Please fill up the form properly";
					}
					else {
						$handle = fopen("data.json", "r");
						$fr = fread($handle, filesize("data.json"));
						$arr1 = json_decode($fr);
						$lastIndex = count($arr1);
						$fc = fclose($handle);
						$data = array('id' => $lastIndex + 1, 'fname' => $fname, 'lname' => $lname, 'gname' => $gname, 'dob' => $dob, 'rname' => $rname, 'pname' => $pname, 'pename' => $pename, 'pphone' => $pphone, 'email' => $email, 'url' => $url, 'uname' => $uname, 'pass' => $pass, 'cpass' => $cpass);
						$handle = fopen("data.json", "w");
						if ($arr1 === NULL) 
						{
							$data = array($data);
							$data = json_encode($data);
						}
						else 
						{
							$arr1[] = $data;
							$data = json_encode($arr1);
						}
						$fw = fwrite($handle, $data);
						$fc = fclose($handle);
						if ($fw) 
						{
							echo "Data Saved Successfully";
						}
					}
				}
				else{
					echo "Password and confirm password not match";
				}
			}
			else {
				echo "password should max 5 characters";
			}

			}
			?>

			


	

	<hr><hr>

	<a href="form.html">Go Back</a>

</body>
</html>