<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log in form</title>
</head>
<body>
	<h2>Log in</h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
		<fieldset>
			<legend>Provide your User name & Password</legend>
				<label for="uname">User Name: </label><br>
	          	<input type="text" id="uname" name="uname"><br>
	          	<label for="pass">Password: </label><br>
	          	<input type="password" id="pass" name="pass" minlength="8"> <br>
		</fieldset>
		<input type="submit" value="Submit">
	</form>
	<?php
		if ($_SERVER["REQUEST_METHOD"] === "POST"){
            function test($data){
                $data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
            }

            $userName = test($_POST['uname']);
            $pass = test($_POST['pass']);

            if (empty($userName) or empty($pass)){
            	echo "Please fill up the form properly";
            }
            else{
            	$handle = fopen("data.json", "r");
            	$fr = fread($handle, filesize("data.json"));

            	$arr1 = json_decode($fr);
            	$lastIndex = count($arr1);

            	$fc = fclose($handle);

            	var_dump($arr1);

            	echo "<br><br>";

            	for($i=0; $i<count($arr1); $i++){
            		echo "<br><br>";
            		echo $arr1[$i]->uname . " " . $arr1[$i]->pass;
            		if($arr1[$i]->uname === $userName){
            			if($arr1[$i]->pass === $pass){
            				//session
            				session_start();
            				$_SESSION['currentUser'] = $arr1[$i]->uname;
            				echo "log in success";
            				header("Location:Welcome.php");
            				return;
            			}
            		} 
            	}
            	echo "wrong user name or password";
            }
        }

	?>


</body>
</html>