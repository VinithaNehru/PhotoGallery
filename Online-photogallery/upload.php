<?php 
session_start();
$hostname_phpimage = "localhost";
$database_phpimage = "login";
$username_phpimage = "root";
$password_phpimage = "";
$phpimage = mysql_connect($hostname_phpimage, $username_phpimage, $password_phpimage) or trigger_error(mysql_errormysql_error(),E_USER_ERROR);
error_reporting(E_ALL);
//echo $_SESSION['u_mail'];
$mail= $_SESSION['u_mail'];
echo $mail;
mysql_select_db('login');
$query1="select u_id from user where u_mail='".$mail."'";
//echo $query1;
$res1=mysql_query($query1,$phpimage);
$uid=mysql_fetch_array($res1);
$_SESSION['u_id']=$uid['u_id'];
if(isset($_POST['submit'])){
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$target_name=$_FILES["filetoUpload"]["tmp_name"];
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
    		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    			if($check !== false) {
        			echo "File is an image - " . $check["mime"] . ".";
        			$uploadOk = 1;
    			} else {
        			echo "File is not an image.";
        			$uploadOk = 0;
    			}
		}
// Check if file already exists
	if (file_exists($target_file)) {
    		echo "Sorry, file already exists.";
    		$uploadOk = 0;
	}
// Check file size
	if ($_FILES["fileToUpload"]["size"] > 1500000) {
    		echo "Sorry, your file is too large.";
    		$uploadOk = 0;
	}	
// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "jfif") {
    		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    		$uploadOk = 0;
	}

// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
    		echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
	} else {
		$uid=$_SESSION['u_id'];
    		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			mysql_select_db($database_phpimage,$phpimage);
			$query="insert into images( path, name, u_id) values (  'uploads/".$target_name."','".$target_file."','".$uid."')";
			//echo $query;
			$result=mysql_query($query);
        		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    		} else {
        		echo "Sorry, there was an error uploading your file.";
    		}
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Upload your file</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color:">
	<h1>Upload your images here!!</h1>
	<div class="cent1">
	<form action="upload.php" method="POST" enctype="multipart/form-data">
	<pre>
		<table align="center" style="margin:10px 0 0 100px;">
		<tr height="50px"><td>
    	<h2 align="center">Select image to upload:</h2></br></td></tr>
    	<tr height="50px"><td><input type="file" name="fileToUpload" id="fileToUpload"></td></tr>
    		<tr height="50px"><td><input align="center" type="submit" value="Upload Image" name="submit"></td></tr>
    	</table>
    		</pre>
	</form>
	<form action="gallery.php">
	<table align="center" style="margin:350px 0 0 -200px ;">
		<tr height="50px"><td><input align="center" type="submit" value="Gallery" name="submit"></td></tr>
	</table>
	</form>
	</div>
</body>
</html>