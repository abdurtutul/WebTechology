<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User List</title>
</head>
<body>

	<h1>User List</h1>

	<?php 
		$handle = fopen("data.json", "r");
		$fr = fread($handle, filesize("data.json"));
		$arr1 = json_decode($fr);
		$fc = fclose($handle);
	?>

	<?php 
		if ($arr1 === NULL) {
			echo "<p>No records found.</p>";
		}
		else {
			echo "<table border='1'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Id</th>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Gerder</th>";
			echo "<th>Date of Birth</th>";
			echo "<th>Religion</th>";
			echo "<th>Present Address</th>";
			echo "<th>Permanent Address</th>";
			echo "<th>Phone</th>";
			echo "<th>Email</th>";
			echo "<th>Webside Link</th>";
			echo "<th>Username</th>";
			echo "<th>Password</th>";
			echo "<th>Delete Data</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			for ($i = 0; $i < count($arr1); $i++) {
				echo "<tr>";
				echo "<td>" . $arr1[$i]->id . "</td>";
				echo "<td>" . $arr1[$i]->fname . "</td>";
				echo "<td>" . $arr1[$i]->lname . "</td>";
				echo "<td>" . $arr1[$i]->gname . "</td>";
				echo "<td>" . $arr1[$i]->dob . "</td>";
				echo "<td>" . $arr1[$i]->rname . "</td>";
				echo "<td>" . $arr1[$i]->pname . "</td>";
				echo "<td>" . $arr1[$i]->pename . "</td>";
				echo "<td>" . $arr1[$i]->pphone . "</td>";
				echo "<td>" . $arr1[$i]->email . "</td>";
				echo "<td>" . $arr1[$i]->url . "</td>";
				echo "<td>" . $arr1[$i]->uname . "</td>";
				echo "<td>" . $arr1[$i]->pass . "</td>";
				//echo "<td>" . $arr1[$i]->cpass . "</td>";
				echo "<td>" . "<a href='DeleteAction.php?id=" . $arr1[$i]->id . "'>Delete</a>" . "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		}
	?>

	<br><br>

	<a href="form.html">Go Back</a>

</body>
</html>