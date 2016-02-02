
<!DOCTYPE html>
<html>
<head>
<title>Results :: SUG OnlineVoting Website</title>
<link rel="stylesheet" type="text/css" href="styles/main_style.css"/>
</head>
<body>
<?php include('includes/header.php');?>
<div class="page_head">
<h1><?php echo date('Y');?> S.U.G Results</h1>

<?php 
//count all votes
include('includes/db_conn.php');

$sql4="SELECT SUM(votes) AS totalVotes FROM candidate";
				$run_query4=mysqli_query($db_conn,$sql4);
				while($total=mysqli_fetch_array($run_query4)){
					$votestotal=$total[0];
					echo '<h2 style="float:left;margin-top:30px;margin-left:50px;font-size:1.5em;">[ Overall Total Votes: '.$votestotal.' ]</h2>';
				}
?>

</div>
<div class="position_box">
	<h2>Kindly Select a Position and Click 'Display'</h2>
	<form method="post">
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
		<select>
		<input type="submit" value="Display" name="display">
		</form>
</div>

<?php



if(isset($_POST['display'])){
	$position_selected=$_POST['position_selected'];


	//count votes for each position
$sql5="SELECT SUM(votes) AS totalVotes FROM candidate WHERE position='$position_selected'";
				$run_query5=mysqli_query($db_conn,$sql5);
				while($total=mysqli_fetch_array($run_query5)){
					$votestotal=$total[0];
				}


//diplay candidates
$sql="SELECT * FROM candidate WHERE position='$position_selected'";
	$run_query=mysqli_query($db_conn,$sql);

	if(mysqli_num_rows($run_query)>0){

		$nr=mysqli_num_rows($run_query);
		
		echo '<h3 style="font-size:2em;text-align:center">('.$nr.') 
		ASPIRANTS FOR <span style="color:maroon;text-decoration:underline"> '.$position_selected.'</span>
		[ Total Votes: '.$votestotal.' ]</h3>';

		while($row=mysqli_fetch_array($run_query)){

			$percent=round($row["votes"]*100/$votestotal)."%";

			echo '<div class="asp">
			<img  height="300" width="300" src="data:image;base64,'.$row[6].' "><br>
			<p style="font-weight:bolder;font-size:1.5em;width:300px;text-align:center;margin-bottom:0px;">'.$row[1].'<br><b>
			<p style="font-size:1em;font-weight:bold;width:300px;text-align:center;margin-bottom:0px;">'.$row[2].'/'.$row[3].'</p
			><b><p style="width:300;text-align:center;color:maroon;font-size:1.3em;background-color:white;padding:10px;">Total Votes: '.$row["votes"].'&nbsp;[ '.$percent.' ]</p>
			</div>';

    }     

}

	else
	{
		echo '<p style="color:darkred;font-weight:bolder;font-size:1.6em;text-align:center;">No candidate for this Position</p>';
		}

}

?>

