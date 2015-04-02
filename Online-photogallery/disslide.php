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
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
    /* Prevents slides from flashing */
    #slides {
      display:none;
    }
  </style>

  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="jquery.slides.min.js"></script>

  <script>
    $(function(){
      $("#slides").slidesjs({
        width: 940,
        height: 528
      });
    });
  </script>
</head>
<body>
<?php while($row=mysql_fetch_array($res)){ ?>
	<div id="slides">
	<img src="<?php echo $row['name'];?>" width="940px" height="528px"/>
	</div>
	<?php } ?>
	
</body>
</html>