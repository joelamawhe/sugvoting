<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>HomePage :: SUG OnlineVoting website</title>
<link rel="stylesheet" type="text/css" href="styles/main_style.css"/>
</head>
<body>			
<?php include_once('includes/header.php');?>			
<div class="layer1">
	<h1>Welcome to Our Online Voting Website</h1>
	<p>This website was developed to enable eligible students to cast their votes for their desired S.U.G candidates in subsequent S.U.G Elections. <BR>
	Its Fast, Simple, Safe and Secure.</p>
<img class="votebox"src="images/votebox.png">

</div>

<?php
include('includes/db_conn.php');			
$sql="SELECT * FROM status";
$result=mysqli_query($db_conn,$sql);
while($row = mysqli_fetch_row($result)){
echo '<h1 class="notice"><span style="background-color:#B23000;color:white;padding:20px;">NOTICE:</span>'.$row[1].'</h1>';				

}

?>

<div class="login">
<h2>STUDENT LOGIN</h2>
<?php $query=@($_GET['action']);

if ($query=="lost_pin"){
		include('includes/recover_form.php');
}

else{
	
	include('includes/check_form.php');
}

;?>
	
	</div>

		<?php include('includes/footer.php');
		

		?>

</body>
</html>
