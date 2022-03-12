<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete User</title>
</head>
<body>

	<h1>Delete User (PHP)</h1>

	<?php 
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$handle = fopen("data.json", "r");
			$fr = fread($handle, filesize("data.json"));
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			$handle = fopen("data.json", "w");
			$arr2 = array();
			for ($i = 0; $i < count($arr1); $i++) {
				if ($id != $arr1[$i]->id) {
					array_push($arr2, $arr1[$i]);
				}
			}

			$data = json_encode($arr2);
			$fw = fwrite($handle, $data);
			$fc = fclose($handle);

			echo "Data Deleted Successfully";
		}
		else {
			die("Invalid Request");
		}
	?>

	<hr><hr>

	<a href="form.html">Go Back</a> | <a href="List.php">Show User List</a>

</body>
</html>