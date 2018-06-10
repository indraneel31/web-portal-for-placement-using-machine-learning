<?php
	require 'dbconfig/config.php';
	session_start();
?>

<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">

</head>
<body background="imgs/bg.jpg">
<h1 class="h">Test Your Skills</h1>
	<div class="box">
	<h2>Login</h2>
	
<form  class="inputBox" action="index.php" method="POST">
<div class="inputBox">
<input name="username" type="text" placeholder="" required="">
<label>Username:</label>
</div>
<div class="inputBox">
<input name="password" type="password" placeholder="" required="">
<label>Password:</label>
</div>
<input name="login" type="submit"  value="Login">
<a href="register.php"><input type="button" value="Register"></a>
</form>
</div>
</body>
</html>
<?php
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="select * from user where username='$username' AND password='$password'";
		$query_run=mysqli_query($con,$query);
		if((mysqli_num_rows($query_run))>0){
			$_SESSION['username']=$username;
			if($username=='admin'){
				header('location:admin.php');
			}
			else{
			header('location: newhomepage.php');
			exit;
			}
			
		}else{
			echo '<script type="text/javascript"> alert("Invalid Username or Password")</script>';
		}
	}

?>
