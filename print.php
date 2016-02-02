<!DOCTYPE html>
<html>
<head>
<title>Print Reports > SUG OnlineVoting website</title>
<link rel="stylesheet" type="text/css" href="styles/main_style.css"/>
</head>
<body>

	
	
<?php

$query=@($_GET['report']);

if ($query=="candidates"){
	include('includes/print_candidate.php');
}

else{
	include('includes/print_student.php');

}

include('includes/footer.php');

?>
