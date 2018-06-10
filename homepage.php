<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color:#7f8c8d">
	<div id="main-wrapper">
	<center><h3>Welcome 
	<?php  
		echo $_SESSION['username']
	?></h3>
	<img src="imgs/avatar.png" class="avatar">
</center>


<form class="myform" action="homepage.php" method="post">

<input name="logout" type="submit" id="logout_btn" value="Log Out">
</form>
<?php 
	if(isset($_POST['logout'])){
	session_destroy();
	header('location:index.php');
	}
	?>
</div>
</body>
</html>