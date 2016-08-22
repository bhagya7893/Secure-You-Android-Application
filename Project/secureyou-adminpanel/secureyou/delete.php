<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php



	session_start();
	
	include("connection/conn.php");
	
	if(isset($_GET['delid']))
	{
		
		$set=$_GET['delid'];
	echo $set;
	
		
		$query = "delete from location where id = '".$set."'"; 
		if(mysql_query($query)){ 
		header('Location: home.php');
		echo "deleted";} else{ echo "fail";}

	}
	
	/*if(!empty($_GET[$delid])){
	$set=$_GET[$delid];*/
	
	
	
	?>
    
    
    
</body>
</html>