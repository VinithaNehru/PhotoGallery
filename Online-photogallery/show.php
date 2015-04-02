<?php require_once('phpimage.php');

mysql_select_db($database_phpimage,$phpimage);
$query="select * from user";
$res=mysql_query($query,$phpimage);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Show</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php while($row=mysql_fetch_array($res)){ ?>
	<h1><a href="gallery.php?uid=<?php echo $row['u_id']?>"><?php echo $row['u_mail']?></a></br></h1>
	<?php } ?>
</body>
</html>