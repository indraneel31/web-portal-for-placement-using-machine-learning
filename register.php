<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body background="imgs/br.jpg">
	<div class="box">
	<h2>Registration Form</h2>



<form class="myform" action="register.php" method="post">
<div class="inputBox">
<label>Username:</label><br>
<input name="username" type="text" class="inputvalues" placeholder="" required/>
</div>
<div class="inputBox">
<label>Password:</label><br>
<input name="password" type="password" class="inputvalues" placeholder="" required/><br>
</div>
<div class="inputBox">
<label>Confirm Password:</label><br>
<input name="cpassword" type="password" class="inputvalues" placeholder="" required/><br>
</div>
<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/><br>
<a href="index.php"><input type="button" id="back_btn" value="Login"/></a>
</form>

</div>
</body>
</html>
<?php
	if(isset($_POST['submit_btn'])){
		//echo '<script type="text/javascript"> alert("Sign Up Button Clicked") </script>';
		$username=$_POST['username'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		if($password==$cpassword)
		{
			$query="select * from user where username='$username'";
			$query_run=mysqli_query($con,$query);
			if((mysqli_num_rows($query_run))>0){
				echo '<script type="text/javascript"> alert("User Already Exists... Try Another Username")</script>';
			}
			else{
			$query="insert into user values('$username','$password')";
			$query_run=mysqli_query($con,$query);
			if($query_run){
				echo '<script type="text/javascript"> alert("User Registered Successfully. Go to Login Page")</script>';
				
			}else{
				echo '<script type="text/javascript"> alert("Error Please Try Again")</script>';
			}
			} 
		}else{
			echo '<script type="text/javascript"> alert("Password & Confirm Password Does Not Match")</script>';
		}
	}

?>