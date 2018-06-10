
<html>
<head>

<title>Portal</title>
<link rel="stylesheet" type="text/css" href="css/global.css">
</head>
<body>
	<div id="header">
	<div class="logo"><a href="#">Test <span>Portal</span></a></div>
	</div>
	<a class="mobile" href="#">Menu</a>
	<div id="container">
	<div class="sidebar">
	<ul id="nav">
		<li ><a href="#">Dashboard</a></li>
		<li><a href="stuprofile.php">Profile</a></li>
		<li><a href="avatest.php">Test</a></li>
		<li><a href="#"></a></li>
		<!--<li><a href="#">Result</a></li>-->
		<li><a href="index.php">Logout</a></li>
	</ul>
	
	</div>
	<div class="content">
	<h1>ADD TEST</h1>
	<p>Upload a file and submit </p>
	<div id="box">
	<div class="box-top">Upload Menu</div>
	<div class="box-panel">
	
<div class="content">
	<form enctype="multipart/form-data" action="addtestdb.php" method="post">
	Browse for File to Upload:<br>
	<input name="file" type="file" size="3000"><br>
	<input type="submit" name="u_button" value="Upload the file">
	</form>
</div>
	</div>
</div>	
</div>
</div>	


</body>
</html>


