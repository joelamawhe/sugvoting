<!DOCTYPE html>
<html>
<head>
<title>Admin Login :: SUG OnlineVoting website</title>
<link rel="stylesheet" type="text/css" href="styles/main_style.css"/>
</head>
<body>
<div id="container">
<?php include('includes/header.php');?>
<?php include('includes/db_conn.php');?>


 <?php 
 session_start();

    $msg="";
   if (isset($_POST['login'])){
    if(($_POST['username']!="")  or ($_POST['username']!="")){
        $username = protect_input($_POST['username']);
        $password = protect_input($_POST['password']);

        $sql="SELECT username,password FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
        $dbquery=mysqli_query($db_conn,$sql);
        $row=mysqli_fetch_array($dbquery);
        $db_username=$row[0];
        $db_password=$row[1];
        if ($username==$db_username and $password==$db_password){
           

           
           $_SESSION['username']=$log_username;
           $_SESSION['password']=$log_password;

            $msg="Login Successful! Redirecting...";
            header('location:'.'dashboard.php');
        }
        else
        {
            $msg='<p style="color:maroon;font-weight:bolder;">Entries Do not match! Please Try again.';
            
        }
       
    }
    else{

         $msg='<p style="color:maroon;font-weight:bolder;">One or Both Fields Missing!';
    }
    
   
}

    function protect_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
<div class="login">

	
    	<h2>Admin Login</h2>
    	<form method="post" name="adminform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  >
            <span class="error"><?php echo $msg; ?></span><br><br>
        	<input type="text" name="username" class="box" placeholder="Username" required="true" autofocus/></br>
            <input type="password" name="password" class="box" required="true" placeholder="Password"/><br>
            <input type="submit" class="button" value="Login" name="login"/>
        </form>		
	
    
    
    </div>
            <?php include('includes/footer.php');?>

</body>





</html>
