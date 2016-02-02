<!DOCTYPE html>
<html>
<head>
<title>Dashboard > SUG OnlineVoting website</title>
<link rel="stylesheet" type="text/css" href="styles/main_style.css"/>
</head>
<body>

	<?php include('includes/header.php');?>
			<div class="page_head">
				<h1>ADMIN DASHBOARD</h1>
			</div>
		
<div class="side_bar">
	<ul>
		<li><a href="?page=student_reg">New Student</a></li>
		<li><a href="?page=reg_candidate">New Candidate</a></li>
		<li><a href="reports.php">Reports</a></li>
		<li><a href="#">Close Session</a></li>
		<li><a href="#">Log Out</a></li>

		<fieldset>
			<legend>Set Election Mode</legend>
			<form method="post">
				<select style="width:150px;height:55px;font-weight:bold;"name="emode">
					<option value="Registration">Registration</option>
					<option value="Voting">Voting</option>
					<option value="off">Off</option>

				</select>
				<input style="font-size:1.3em;padding:5px;margin-left:10px;height:55px;" type="submit" name="set" value="Okay">
			</form>
		</fieldest>




	</ul>
</div>	
<?php 
	include('includes/db_conn.php');			

//set election status
$election_status='<h1 class="notice"><span style="background-color:#B23000;color:white;padding:20px;">NOTICE:</span> 2015/2016 S.U.G ELECTION IS CURRENTLY ONGOING!</h1>';

if(isset($_POST['set'])){

$date=date('Y');
	$emode=$_POST['emode'];
	if ($emode=="Registration"){

	$sql="UPDATE status SET satus='Registration for $date Election is Ongoing!' WHERE id='0'";
	$result=mysqli_query($db_conn,$sql);
	echo '<span class="success">Registration is now in progress!</span>';

	}

	else if($emode=='Voting'){
		$sql="UPDATE status SET satus='Voting Excercise for $date Election is Ongoing!' WHERE id='0'";
	$result=mysqli_query($db_conn,$sql);
		echo '<span class="success">Voting is in progress</span>';
	}
	else if($emode=='off'){
		$sql="UPDATE status SET satus='No Electoral Process is Ongoing!' WHERE id='0'";
	$result=mysqli_query($db_conn,$sql);
		echo '<span class="success">Election is off</span>';
	}

}

$query=@($_GET['page']);

if ($query=="reg_candidate"){
	include('includes/cand_reg.php');
}

else{
	include('includes/student_reg.php');
}

include('includes/footer.php');

?>

</body>
</html>
