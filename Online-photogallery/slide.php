<?php require_once('phpimage.php');
session_start();
mysql_select_db($database_phpimage,$phpimage);
$id=$_SESSION['u_id'];
$query="select * from images where u_id='".$id."'";
$res=mysql_query($query,$phpimage);
?>
<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- bxSlider Javascript file -->
<script src="jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="jquery.bxslider.css" rel="stylesheet" />

<title>Display</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="page1.html">
<pre>
																			<input type="submit" value="Sign out!" name="login">
</pre>
	</form>

<?php
	echo '<ul class="bxslider">';
	while($row=mysql_fetch_array($res))
	{
		echo '<li><img src="'.$row['name'].'"//><//li>';
	}
	echo '</ul>';
?>
<script type="text/javascript">
$(document).ready(function(){
	//alert('test');
  $('.bxslider').bxSlider();
});
</script>

</body>
</html>