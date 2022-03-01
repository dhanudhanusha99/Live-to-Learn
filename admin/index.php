<?php
session_start();
include('connection.php');
if( (isset($_POST['un'])) and  (isset($_POST['ps'])) )
 {
	 $query=mysql_query("select * from admin where username='".$_POST['un']."' and  password='".$_POST['un']."'");
	 if(mysql_num_rows($query) > 0)
	   {
         $_SESSION['admin']=$_POST['un'];
		header('location: adminhome.php');
	   }
	  else
	   {
		    $_SESSION['admin']="";
			header('location: index.php?lo=fail');
		}
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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

    <form method="post" action="index.php">
    <table width="303" height="165" border="0">
    <tr>
        <td colspan="2" style="text-align:center;">
                <?php
	 if($_GET['lo']=="fail")
	  {
		  print(" <font color='red' size='6'><b> Login  Failed</b></font> ");
	  }
	?>
</td>
        </tr>
      <tr>
        <td colspan="2" style="text-align:center;" class="td"><strong>Admin Login</strong></td>
        </tr>
      <tr>
        <td width="118">User Name</td>
        <td width="143"><span id="sprytextfield1">
          <input type="text" name="un" id="text1" />
          <span class="textfieldRequiredMsg">Enter User Name.</span></span></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><span id="sprytextfield2">
          <input type="password" name="ps" id="text2" />
          <span class="textfieldRequiredMsg">Enter Password.</span></span></td>
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