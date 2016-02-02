<!DOCTYPE html>
<html>
<head>
<title>Reports > SUG OnlineVoting website</title>
<link rel="stylesheet" type="text/css" href="styles/main_style.css"/>
</head>
<body>

	<?php include('includes/header.php');?>
	<div class="page_head">
		<h1>View Reports</h1>
		<div class="select_report">
			<a href="?page=candidate_report">Candidates</a>
			<a href="?page=student_report">Students</a>
					<a href="dashboard.php">Back to Dashboard</a>

		</div>
	</div>


		<?php

$query=@($_GET['page']);

if ($query=="candidate_report"){
	include('includes/candidate_report.php');
}

else{
	include('includes/student_report.php');

}

include('includes/footer.php');

?>
		
				


<body>
</htnl>
