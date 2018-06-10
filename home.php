<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div id="slidebar">
		<div class="toggle-btn" onclick="toggleSidebar()">
	<span></span>
	<span></span>
	<span></span>
	</div>
	<ul>
	<li>Home</li>
	<li>About</li>
	<li>Contact</li>
	</ul>
	</div>
	<script type="javascript"> 
		function toggleSidebar(){
			document.getElementById("sidebar").classList.toggle('active');
			
		}

	</script>

</body>
</html>
