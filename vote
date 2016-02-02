<?php  session_start() ;?>
<!DOCTYPE html>
<html>
<head>
<title>Voting Page > SUG OnlineVoting website</title>
<link rel="stylesheet" type="text/css" href="styles/main_style.css"/>
</head>
<body>

	<?php

	include('includes/db_conn.php');
	include('includes/header.php');

	if(isset($_SESSION['user'])){

	$userid=$_SESSION['user'];
	$usermatno=$_SESSION['matno'];

	

}

?>

	<div class="page_head">
	<h1>Welcome, <?php echo @$userid;?> !</h1>
<a href="?action=logout" name="logout" value="logout">Log Out</a>
	
	 <?php

		if(@$_GET['action']=="logout"){
			session_destroy();
			header('location:index.php');

		}

	?>
</div>

<div class="position_box">
	<h2>Kindly Select a Position and Click 'Display'</h2>
	<form method="GET" action="">
	<select name="position_selected" focus="true" value="<?php echo $position_selected ;?>">
		<option value="President">President</option>
		<option value="Vice President">Vice President</option>
		<option value="Secretary General">Secretary General</option>
		<option value="Assistant Secretary Gen.">Assistant Secretary Gen.</option>
		<option value="Treasurer">Treasurer</option>
		<option value="Director of Finance">Director of Finance</option>
		<option value="Sports Director">Sports Director</option>
		<option value="Social Director">Social Director</option>
		<option value="Assistant Social Director">Assistant Social Director</option>
		<option value="Welfare Director">Welfare Director</option>
		<option value="Assistant Welfare Director">Assistant Welfare Director</option>
	</select>
		<input type="submit" value="Display" name="display">
		</form>
</div>

<?php 
if(isset($_REQUEST['user']) and (isset($_REQUEST['position'])) and (isset($_REQUEST['name']))){

 	$matno=$_REQUEST['user'];
	$position=$_REQUEST['position'];
	$name=$_REQUEST['name'];


	#CHECK IF POSITION AND STUDENT MATRIC NUMBER ARE ON SAME ROW in VOTED CANDIDATE TABLE
	$sql="SELECT * FROM voted_candidate WHERE position='$position' and student_matno='$usermatno'";
	$run_query=mysqli_query($db_conn,$sql);
	$nr=mysqli_num_rows($run_query);

	if(mysqli_num_rows($run_query)<1){
			//UPDATE STUDENT'S TABLE TO SHOW YES ON VOTE STATUS 
			//$sql0="UPDATE student SET  votestatus="Yes" WHERE matnumber='$matno'";
			//$run_query0=mysqli_query($db_conn,$sql0);
			//if(!$run_query0){
				//echo mysqli_error($db_conn);
			//}
			//UPDATE CANDIDATES TABLE WITH ONE VOTE
			$sql1="UPDATE candidate SET  votes=votes+1 WHERE matno='$matno'";
			$run_query1=mysqli_query($db_conn,$sql1);
			//INSERT DATA ON VOTED CANDIDATE'S TABLE
			$sql2="INSERT INTO voted_candidate(candidate_name,candidate_matno,student_matno,student_name,position) VALUES('$name','$matno','$usermatno','$userid','$position')";
			$run_query2=mysqli_query($db_conn,$sql2);
			echo '<h3 class="voted">YOUR VOTE HAS BEEN CASTED FOR<br><br><span style="font-weight:bolder;font-size:2em;background-color:white;color:maroon;padding:10px;margin-top:50px;">'.$name.'<br></h3>';	
					
	}
	else{

		echo '<h3 class="notvoted">YOU HAVE VOTED FOR THIS POSITION ALREADY!</h3>';
							

	}
			
}
else
{
?>

<?php 
if(isset($_GET['display'])){
	
	$position_selected=$_GET['position_selected'];
	$sql="SELECT * FROM candidate WHERE position='$position_selected'";
	$run_query=mysqli_query($db_conn,$sql);

	if(mysqli_num_rows($run_query)>0){
		$nr=mysqli_num_rows($run_query);
		echo '<h3 style="font-size:2em;text-align:center">('.$nr.') ASPIRANTS FOR <span style="color:maroon;text-decoration:underline"> '.$position_selected.' </span>[Click on Candidate\'s Image to Vote] </h3>';
		while($row=mysqli_fetch_array($run_query)){
			echo '<div class="asp">
			<a class="votelink" href="?user='.$row["matno"].'&position='.$row["position"].'&name='.$row["name"].'">
			<img title="Click Image to Vote" height="300" width="300" src="data:image;base64,'.$row[6].'"></a><br>
			<p style="font-weight:bolder;font-size:1.5em;width:300px;text-align:center;margin-bottom:0px;">'.$row[1].'<br><b>
			<p style="font-size:1em;font-weight:bold;width:300px;text-align:center;margin-bottom:0px;">'.$row[2].'/'.$row[3].'</p><b><br>
			</div>';

    } 
   
}

	else{
		echo '<p style="color:darkred;font-weight:bolder;font-size:1.6em;text-align:center;">No candidate for this Position</p>';
		}
}
}
?>
	<?php include('includes/footer.php');?>
