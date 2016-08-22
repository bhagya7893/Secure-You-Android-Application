<?php
//	session_start();
	include("../connection/conn.php");
	//include("../connection/sessioncheck.php");
	
	$username=$_REQUEST["username"];
	
	$oldpasswd=$_REQUEST['password'];
	$oldpasswd=md5($oldpasswd);
	$sql=mysql_query("select * from admin where username='$s_username' and password='$oldpasswd'");
	if(mysql_num_rows($sql)==0)
	{	header("location:changepassword.php?passwdwrong=1&username=$username");
		exit;
	}
	else
		$newpasswd=$_REQUEST['password'];
	$newpasswd=md5($newpasswd);

	$sql=mysql_query("update admin set password='$newpasswd' where  username='$s_username'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
<title></title>
<body>
<center>
<br /><br /><br /><br /><br /><h2>Password Changed Successfully<br /><br /></h2>
</center>
</body>
</head>