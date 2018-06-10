<?php include 'database.php';?>
<?php session_start(); ?>
<?php
// check to see if score is set_error_handler
	if(!(isset($_SESSION['score']))){
		$_SESSION['score']=0;
		$_SESSION['t1']=0;
		$_SESSION['t2']=0;
		$_SESSION['t3']=0;
		$_SESSION['ta1']=0;
		$_SESSION['ta2']=0;
		$_SESSION['ta3']=0;
	}
	if($_POST){
		$number=$_POST['number'];
		$selected_choice=$_POST['choice'];
		
		$next=$number+1;
		//get total question
		$query="select * from test";
		//get correct choice
		$results=$mysqli->query($query) or die ($mysqli->error.__LINE__);
		$total=$results->num_rows;
		
		
		
		$queryc="select corr_ans from test where ques_no=$number";
//get result
$resultc=$mysqli->query($queryc) or die($mysqli->error.__LINE__);
$correct=$resultc->fetch_assoc();
		$correct_choice=$correct['corr_ans'];
		
		$queryt="select ques_type from test where ques_no=$number";
//get result
$resultt=$mysqli->query($queryt) or die($mysqli->error.__LINE__);
$correctt=$resultt->fetch_assoc();
		$type=$correctt['ques_type'];
		if($type==1){
			$_SESSION['ta1']=$_SESSION['ta1']+1;
		}elseif($type==2){
			$_SESSION['ta2']=$_SESSION['ta2']+1;
		}else{
			$_SESSION['ta3']=$_SESSION['ta3']+1;
		}
		if($correct_choice==$selected_choice AND $type==1){
			//answer is correct
			$_SESSION['score']=$_SESSION['score']+1;
			$_SESSION['t1']=$_SESSION['t1']+1;
		}elseif($correct_choice==$selected_choice AND $type==2){
			$_SESSION['score']=$_SESSION['score']+1;
			$_SESSION['t2']=$_SESSION['t2']+1;
		}elseif($correct_choice==$selected_choice AND $type==3){
			$_SESSION['score']=$_SESSION['score']+1;
			$_SESSION['t3']=$_SESSION['t3']+1;
		}
		//check last
		if($number==$total){
			header("Location: final.php");
			exit();
		}else{
			header("Location: question.php?n=".$next);
		}
	}

?>