<?php require_once('phpimage.php');
session_start();
mysql_select_db($database_phpimage,$phpimage);
$id=$_SESSION['u_id'];
$query="select * from images where u_id='".$id."'";
$res=mysql_query($query,$phpimage);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Display</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<form action="slide.php">
		<input align="right" type="submit" value="View" name="submit">
	</form>
	<form action="page1.html">
									<input type="submit" value="Sign out!" name="login">
	</form>
<?php while($row=mysql_fetch_array($res)){ ?>
	<img src="<?php echo $row['name'];?>" width="500px" height="500px"/></br>
	<?php } ?>
	
</body>
</html>