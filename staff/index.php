<?php require_once('../Connections/db_conn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['text1'])) {
  $loginUsername=$_POST['text1'];
  $password=$_POST['text2'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "staff_home.php";
  $MM_redirectLoginFailed = "index.php?log=f";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_db_conn, $db_conn);
  
  $LoginRS__query=sprintf("SELECT staff_username, staff_password FROM staff WHERE staff_username=%s AND staff_password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $db_conn) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      
  mysql_select_db($database_db_conn, $db_conn);
  mysql_query("insert into chatusers values('".$loginUsername."','staff')");
    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<link href="style.css" type="text/css" rel="stylesheet" />
<body >
<table width="100%" border="0" cellspacing="0" cellpadding="0"  height="100%" class="maintable" >
<tr>
  <td align="center">
      <table width="900" border="0" height="900" >
  <tr>
    <td height="91"  colspan="2"><img src="../images/banner.jpg" width="899" height="118" /></td>
    </tr>
  <tr>
    <td width="166" >&nbsp;</td>
    <td width="729" style="text-align:center; vertical-align:top; padding-top:200px; padding-left:100px;">

    <form method="POST" action="<?php echo $loginFormAction; ?>" name="login">
    <table width="303" height="165" border="1">
    <tr>
        <td colspan="2" style="text-align:center;">
                <?php
	 if($_GET['log']=="f")
	  {
		  print(" <font color='red' size='6'><b> Login  Failed</b></font> ");
	  }
	  
    if($_GET['lout']=="k")
	  {
		 echo("Successfully Logout");
	  }
			 
	?>
</td>
        </tr>
      <tr>
        <td colspan="2" style="text-align:center;" class="td"><strong>Staff Login</strong></td>
        </tr>
      <tr>
        <td width="118">User Name</td>
        <td width="143"><span id="sprytextfield1">
          <input type="text" name="text1" id="text1" />
          <span class="textfieldRequiredMsg">User Name Required.</span></span></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><span id="sprytextfield2">
          <input type="password" name="text2" id="text2" />
          <span class="textfieldRequiredMsg">Password Required.</span></span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="Login" /> <input type="reset" name="button2" id="button2" value="Reset" /></td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
</table>

  </td>
</tr>
</table>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
</body>
</html>