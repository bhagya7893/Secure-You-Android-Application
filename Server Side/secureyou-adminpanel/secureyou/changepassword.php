<?php
	//session_start();
	session_start();


	include("connection/conn.php");
	

	//include("../connection/sessioncheck.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Login PHP</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="jquery-1.7.min.js"></script>
	<script type="text/javascript">
	
    
document.onkeydown=DisableCtrlKey;
function DisableCtrlKey(e) 
{ 
	var keycode;
	if (window.event) {
		keycode=window.event.keyCode;
		}
	else if (e) {
		keycode=e.which;
		}
	if(keycode == 17||keycode == 16) {		
		alert('Release Control Keys');
		void(0);
		} 
}


function validate()
{	if(document.changepasswdform.oldpasswd.value == 0)
	{	alert("Enter Old Password"); document.changepasswdform.oldpasswd.focus(); return false;	}
	if(document.changepasswdform.password.value == 0)
	{	alert("Enter New Password"); document.changepasswdform.password.focus(); return false;	}
	if(document.changepasswdform.password2.value == 0)
	{	alert("Retype New Password"); document.changepasswdform.password2.focus(); return false;	}
	if(document.changepasswdform.password.value != document.changepasswdform.password2.value)
	{	alert("Password Mismatch; Try Again"); document.changepasswdform.password.value=""; document.changepasswdform.password2.value=""; document.changepasswdform.password.focus(); return false;	}
}
</script>
</head>

<body>
<br><center>
  <h2>Change Password </h2>
<form name="changepasswdform" method="post" action="newpasswdsave.php">
<?php
	if($passwdwrong==1)
	{	
?>
<script type="text/javascript" language="javascript">
	alert("Enter Current Password Correctly"); document.changepasswdform.oldpasswd.focus();
</script>

<?php	
	}
	$sql=mysql_query("select * from admin where username=$username");
	$row=mysql_fetch_array($sql);
	$username=$row['username'];
?>
  <table width="100%" cellspacing="1">
    <tr>
      <td><div align="right">User Name :&nbsp;&nbsp;</div></td>
      <td><div align="left"><?php	print($username);	?></div></td>
	  <input type="hidden" name="username"  value="<?=$username?>"/>
    </tr>
    <tr>
      <td><div align="right">Current Password :&nbsp;&nbsp;</div></td>
      <td><div align="left">
        <input name="oldpasswd" type="password" id="oldpasswd" />
      </div></td>
    </tr>
    <tr>
      <td><div align="right">New Password :&nbsp;&nbsp;</div></td>
      <td><div align="left"><input name="password" type="password" id="password"></div></td>
    </tr>
    <tr>
      <td><div align="right">Confirm New Password :&nbsp;&nbsp;</div></td>
      <td><div align="left"><input name="password2" type="password" id="password2"></div></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><div align="left"></div></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td><div align="left"><input type="submit" name="Submit" value="Update" onClick="return validate();">
      </div></td>
    </tr>
  </table>
</form>

</center>
</body>
</html>
