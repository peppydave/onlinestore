<?php
/*define ('DBNAME', 'onlinestore');
define('DBUSER', 'root');
define('DBPASS', 'peppydev');

try{
	# prepare a pdo instance
$pdo = new PDO ('mysql:host=localhost;dbname =' .DBNAME, DBUSER, DBPASS);

	# set verbose error modes
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
} catch(PDOException $e){
	echo $e->getmessage();
}*/


#max file size


define("MAX_FILE_SIZE", "2097152");

$ext = ["image/jpg", "image/jpeg", "image/png"];
	if(array_key_exists('save', $_POST)) {
		$errors = [];

	#Be sure a file was selcted
	if (empty($_FILES['pic']['name'])) {
		$errors[] = "Please choose a file";
	}
	#check file size
	if ($_FILES['pic']['size'] > MAX_FILE_SIZE) {
		$errors[] = "file size exceeds maximum. maximum: ".MAX_FILE_SIZE;
	}

	#check extension
	if (!in_array($_FILES['pic']['type'], $ext)) {
		$errors[] = "Invalid file type";
	}
	#Generate Random number to append
	$rnd = rand(0000000000, 9999999999);

	#strip filename for spaces
	$strip_name = str_replace(" ", "_", $_FILES['pic']['name']);

	$filename = $rnd.$strip_name;
	$destination = 'uploads/'.$filename;

	if(!move_uploaded_file($_FILES['pic']['tmp_name'], $destination)) {
		$errors[] = "file upload failed";
	}

	if(empty($errors)) {
		echo "done";
	} else {
		foreach ($errors as $err) {
			echo $err. '</br>';
		}
	}
}

?>

<form id="register" method="POST" enctype="multipart/form-data"> 
<p>Please upload a file</p>
<input type="file" name="pic">
<input type="submit" name="save">


</form>
