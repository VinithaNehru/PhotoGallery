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
	<link rel="stylesheet" type="text/css" href="mosaic.css">
</head>
<body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="jquery.mosaicflow.min.js"></script>
	<?php while($row=mysql_fetch_array($res)){ ?>
		<div class="clearfix mosaicflow"> 
			<div class="mosaicflow__item"> 
				<img width="500" height="300" src="<?php echo $row['name'];?>" alt="">
			</div> 
		</div>
	<?php } ?>
</body>
</html>