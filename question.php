<?php session_start(); ?>
<?php include 'database.php'; ?>
<?php
//set question number
$number=(int)$_GET['n'];
//get question
$query="select ques from test where ques_no=$number";
//get result
$result=$mysqli->query($query) or die($mysqli->error.__LINE__);
$question=$result->fetch_assoc();


//get question
$query1="select opt1 from test where ques_no=$number";
//get result
$result1=$mysqli->query($query1) or die($mysqli->error.__LINE__);
$op1=$result1->fetch_assoc();

//get question
$query2="select opt2 from test where ques_no=$number";
//get result
$result2=$mysqli->query($query2) or die($mysqli->error.__LINE__);
$op2=$result2->fetch_assoc();

//get question
$query3="select opt3 from test where ques_no=$number";
//get result
$result3=$mysqli->query($query3) or die($mysqli->error.__LINE__);
$op3=$result3->fetch_assoc();

//get question
$query4="select opt4 from test where ques_no=$number";
//get result
$result4=$mysqli->query($query4) or die($mysqli->error.__LINE__);
$op4=$result4->fetch_assoc();
//get total question
		$query5="select * from test";
		//get correct choice
		$result5=$mysqli->query($query5) or die ($mysqli->error.__LINE__);
		$total=$result5->num_rows;
		
		

?>
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
<div class="current">Question <?php echo $number; ?> of <?php echo $total; ?></div>
<p class="question">
<?php
echo $question['ques'];

?>


</p>
<form method="POST" action="process.php">
<ul class="choices">
<li><input name="choice" type="radio" value="1" /><?php echo $op1['opt1'];?></li>
<li><input name="choice" type="radio" value="2" /><?php echo $op2['opt2'];?></li>
<li><input name="choice" type="radio" value="3" /><?php echo $op3['opt3'];?></li>
<li><input name="choice" type="radio" value="4" /><?php echo $op4['opt4'];?></li>

</ul>
<input type="submit" value="Submit"/>
<input type="hidden" name="number" value="<?php echo $number;?>" />
</form>
</div>
</main>
<footer>
<div class="container">

SGI Aptitude Portal

</div>

</footer>
</body>

</html> 