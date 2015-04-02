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
	<link rel="stylesheet" type="text/css" href="slideshow.css">

</head>
<body>
<div id="slideshow">
<?php while($row=mysql_fetch_array($res)){ ?>
	
    		<img src="<?php echo $row['name'];?>" alt="" class="active" />
	
	<?php } ?>
</div>
<script src="slidescript.js"></script>	
	<form action="page1.html">
	<input type="submit" value="Sign out!" name="login">
	</form>
</body>
</html>