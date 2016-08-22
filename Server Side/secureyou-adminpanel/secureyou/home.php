<!--<style>
body {
  font: normal medium/1.4 sans-serif;
}
div.header{
padding: 10px;
background: #e0ffc1;
width:30%;
color: #008000;
margin:5px;
}
table {
  border-collapse: collapse;
  width: 25%;
  margin-left: auto;
  margin-right: auto;
}
form{
width: 30%;
  margin-left: auto;
  margin-right: auto;
padding: 10px;
border: 2px solid #edd3ff;
}
div#msg{
margin-top:10px;
width: 30%;
margin-left: auto;
margin-right: auto;
text-align: center;
}
</style>-->


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Login PHP</title>
	<link rel="stylesheet" href="style.css" />
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="jquery-1.7.min.js"></script>
	<script type="text/javascript">
	</script>
    </head>
    <body>



<div align="center"="lg-container1">

<form  action="logout.php" id="lg-form1">

<div align="right">
 <img src="logo.png" width="60" height="60"  align="left" style="margin-left:600px">
  <button  type="submit" id="login" >Logout</button>
 </div>  
<h1 style="color:#FFF" align="center">

SecureYou : Admin Panel</h1>
        
  </form>
<form method="POST" id="lg-form1" name="lg-form1">
			
<div align="center">
<label style="color:#FFF" for="Latitude">Latitude:&nbsp;&nbsp;</label>
   <input type="text" name="lat" id="lat" />
</div>
			
<div align="center">
<label style="color:#FFF" for="Longitude">Longitude:</label>
<input type="text" name="longi" id="longi"  />
</div>
			
<div align="center">				
<button type="submit" id="login" value="Save">Save</button>
</div>
          
<?php
include_once './db_functions.php';
//Create Object for DB_Functions clas
if(isset($_POST["lat"]) && isset($_POST["longi"]) && !empty($_POST["lat"]) && !empty($_POST["longi"])){
$db = new DB_Functions(); 
//Store User into MySQL DB
$lat = $_POST["lat"];
$longi = $_POST["longi"];

$res = $db->storeUser($lat, $longi);
	//Based on inserttion, create JSON response
	if($res){ ?>
		 <div id="msg">Insertion successful</div>
	<?php }else{ ?>
		 <div id="msg">Insertion failed</div>
	<?php }
} else{ ?>
 <!--<div id="msg">Please enter name and submit</div>-->
<?php }
include("connection/conn.php");
				$qry=mysql_query("select * from location");
				$num_data=mysql_num_rows($qry);
?>
<h3 style="color:#FFF" id="selected_detail">DETAILS</h3>                  
<table width="500px" border="1" style="border:collapse" >
                            
      <tr>
         <td style="color:#FFF" align="center">ID</td>
         <td style="color:#FFF" align="center">Latitude</td>
         <td style="color:#FFF"  align="center">Longitude</td>
         <td style="color:#FFF" align="center">Action</td>
      </tr>
<?php if($num_data>0){
 while($rows=mysql_fetch_array($qry))
{	
echo '<tr>
<td style="color:#000" align="center">'.$rows["id"].'</td>
<td style="color:#000"  align="center">'.$rows["lat"].'</td>
<td style="color:#000" align="center">'.$rows["lon"].'</td>
<td style="color:#000"  align="center"> <a href="delete.php?delid='.$rows["id"].'">Delete</a></td>
</tr>';
}
}else{
echo '<tr align="center"><td colspan="4">No Data found!</td></tr>';
}
?>
</table>
</form></div>
</body>
</html>