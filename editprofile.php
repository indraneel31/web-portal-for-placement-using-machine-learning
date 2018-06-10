<?php
	require 'dbconfig/info.php';
	session_start();
?>

<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#7f8c8d">
<div class="box">
	<h2>Edit Profile</h2>

<form class="inputBox" action="newhomepage.php" method="POST">
<div class="inputBox">
<label>Username:</label> 
<input name="username" type="text" placeholder="" required> </div>
<div class="inputBox">
<label>First Name</label> 
<input name="fname" type="text" placeholder="" required> </div>
<div class="inputBox">
<label>Middle Name</label> 
<input name="mname" type="text" placeholder="" required> 
</div>
<div class="inputBox">
<label>Last Name</label> 
<input name="lname" type="text" placeholder="" required></div>
<div class="inputBox">
<label>Class</label> 
<input name="class" type="text" placeholder="" required> </div>
<div class="inputBox">
<label>Division</label> 
<input name="divison" type="text" placeholder="" required> </div>
<div class="inputBox">
<label>E-mail</label> 
<input name="email" type="text" placeholder="" required> </div>
<div class="inputBox">
<label>Mob No</label> 
<input name="mobno" type="text" placeholder="" required> </div>
<div class="inputBox">
<label>Address</label> 
<input name="address" type="text" placeholder="" required> </div>
<input name="Submit"type="submit" value="Submit"> 
<!--<a href="register.php"><input type="button" id="register_btn" value="Register"></a>-->
</form>
</div>
</div>
</body>
</html>


<?php
	if(isset($_POST['Submit'])){
		$username=$_POST['username'];
		$fname=$_POST['fname'];
		$mname=$_POST['mname'];
		$lname=$_POST['lname'];
		$class=$_POST['class'];
		$divison=$_POST['division'];
		$email=$_POST['email'];
		$mobno=$_POST['mobno'];
		$address=$_POST['address'];$query="select * from studentinfo where username='$username'";
			$query_run=mysqli_query($con,$query);
			if((mysqli_num_rows($query_run))>0){
$query="update studentinfo set username=$username,fname=$fname,mname=$mname,lname=$lname,class=$class,division=$division,email=$email,mob$mobno,address$address where username=$username";
				$query_run=mysqli_query($con,$query);
				if($query_run){
				echo '<script type="text/javascript"> alert("Updated Successfully")</script>';
				
			}else{
				echo '<script type="text/javascript"> alert("Error Please Try Again")</script>';
			}
			}else{
		$query="insert into studentinfo values ('username','fname','mname','lname','class','division','email','mobno','address')";
		$query_run=mysqli_query($con,$query);
			if($query_run){
				echo '<script type="text/javascript"> alert("Profile Updated Successfully")</script>';
				
			}else{
				echo '<script type="text/javascript"> alert("Error Please Try Again")</script>';
			}
			}
	}

?>