<?php require_once('phpimage.php');
session_start();
mysql_select_db("$database_phpimage") or die("not connected");
function SignIn(){
	if(!empty($_POST['u_mail']))
	{
		$query=mysql_query("select * from user where u_mail='".$_POST['u_mail']."' AND pass='".$_POST['pass']."'") or die(mysql_error());
			//if(!empty($_POST['u_mail'])AND !empty($row['pass']))
			$numrow= mysql_num_rows($query);
			if( $numrow == 1)
			{

				$res=mysql_fetch_array($query);
				$_SESSION['u_mail']=$_POST['u_mail'];
				$_SESSION['u_id']=$res['u_id'];
				//header('Location:upload.php');
echo "Test";
				echo '<script>window.location= "upload.php";</script>';
			}
			else
			{
				echo "The username or password you entered is wrong. Please try again";
			}
		
	}
}
if(isset($_POST['submit']))
{
	SignIn();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Welcome to PhotoGallery!</h1>
	<h2>Login to continue!</h2>
	<section class="loginform cf">
	<form name="login" action="login.php" method="POST" accept-charset=utf-8">
	<fieldset>
	<legend>Fill in your details here:</legend>
	<pre>
		<label for="usermail">Email : </label>    <input type="email" name="u_mail" placeholder="yourname@email.com" size=30 style="height:20px;" required></br>
	
		<label for="password">Password : </label><input type="password" name="pass" placeholder="password" size=30 style="height:20px;" required></br>
	
						<input type="submit" name = "submit" svalue="Login">
					
				     <a href="newuser.php" style="font-size: 20px;">Are you a new user?</a>
	</fieldset>
	</form>
	<form action="show.php">
	<pre>

<input type="submit" name = "submit" value="To Sign in as admin Click Here!">
<input type="password" name="pass" placeholder="password" size=30 style="height:20px;" required>
	</pre>
	</form>
	</section>
</body
</html>