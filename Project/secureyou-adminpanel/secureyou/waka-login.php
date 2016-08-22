<?php

	/*$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax)
	{
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];*/
		
		/* 
			:: Note to Wakaka Friends
			-----------------------------------------------------------------------------------------
			You can put your MySQL query here to check availability Username & Password from database
		*/
		
		//if($username == 'wakaka' && $password == 'design')
//		{
//			echo "success";
//		}
//	}




include("connection/conn.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
 $myusername = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $mypassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

//$myusername=mysqli_real_escape_string($_POST['username']);
//$mypassword=mysqli_real_escape_string($_POST['password']);

$sql="SELECT id FROM admin WHERE username='$myusername' and passcode='$mypassword'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
//$active=$row['active'];
$count=mysql_num_rows($result);




// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
	
$_SESSION['login_user']=$myusername;

header("location: home.php");
}
else
{
$error="Your Login Name or Password is invalid";
echo $error;
}
}


?>
