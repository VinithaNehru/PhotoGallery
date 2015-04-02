<html>
<head>
	<title>New User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>Sign Up!!</h1>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  >
		<pre>
			
		<label for="usermail">Email : </label>			<input class="tb" type="text" name="unameS" id="unameS" size="26"/></br>
				
		<label for="pass">Password : </label>		<input class="tb" type="password" name="passS" id="passS" size="26"/></br>

		<label for="cpass">Confirm Password : </label>	<input class="tb" type="password" name="cpassS" id="cpassS" size="26"/></br>

				<input type="submit" value="Join!!" class="butC1" name="sig_but_sub"/>
	</pre>
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
