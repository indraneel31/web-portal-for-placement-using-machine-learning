<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Test</title>
	<link rel="stylesheet" href="css/question.css" type="text/css" />
</head>
<body>
<header>
<div class="container">
<h1>Welcome to Test</h1>
</div>
</header>
<main>
<div class="container">
<h2>You are done</h2>
<p>Congrats You have completed the test</p>
<p>Final Score of Permutation & Combination:<?php echo $_SESSION['t1'];?> out of <?php echo $_SESSION['ta1'];?></p>
<p>Final Score of Time & Work:<?php echo $_SESSION['t2'];?> out of <?php echo $_SESSION['ta2'];?></p>
<p>Final Score of Time and Distance:<?php echo $_SESSION['t3'];?> out of <?php echo $_SESSION['ta3'];?></p>

<p>Final Score:<?php echo $_SESSION['score'];session_destroy();?></p>
<a href="question.php?n=1" class="start">Take Again</a><br>
<a href="avatest.php" class="start">End Test</a> 
</div>
</main>
<footer>
<div class="container">

SGI Aptitude Portal

</div>

</footer>
</body>

</html>