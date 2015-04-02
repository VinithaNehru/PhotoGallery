<html>
<head>
	<title>New User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="cent1">
<div class="topleft"><h1>Sign Up!!</h1></div>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  >
			<table class="cent1">
				<tr height="60" ">
				<td width="150" >User e-mail : </td>
				<td  ><input class="tb" type="text" name="unameS" id="unameS" size="26"/></td>
				</tr>
				
				<tr  height="60">
				<td >Password :</td>
				<td ><input class="tb" type="password" name="passS" id="passS" size="26"/></td>
				</tr>
				<tr  height="60">
				<td >Confirm Password :</td>
				<td ><input class="tb" type="password" name="cpassS" id="cpassS" size="26"/></td>
				</tr>
			</table>
			<input type="submit" value="Join!!" class="butC1" name="sig_but_sub"/>
		</form>
</div>
<?php require_once('phpimage.php');
session_start();
error_reporting(E_ALL);

if( $_SERVER['REQUEST_METHOD']== "POST")
	{
		if($_POST['passS']==$_POST['cpassS'])
		{
			if($phpimage){
				mysql_select_db("$database_phpimage") or die("not connected");
				$uname= mysql_real_escape_string($_POST['unameS']);
				$pass = mysql_real_escape_string($_POST['passS']);
				$query= "insert into user(u_mail,pass) values('".$uname."','".$pass."')";
				$res=mysql_query($query);
				if($res)
				{
					echo "<script type='text/javascript'>alert('Welcome!! Login to continue');</script>";
					header('Location:login.php');
				}
				else
				{
					echo "<script type='text/javascript'>alert('Encountered some problem while adding you. Please try again');</script>";
					header('Location:newuser.php');
				}	
			}
		}
		else
		{
			echo '<script language="javascript"> alert("Passwords dont match");</script>';
		}
	}
?>
</body>
</html>				
