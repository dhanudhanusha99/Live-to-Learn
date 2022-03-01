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

if ((isset($_GET['staff_id'])) && ($_GET['staff_id'] != "")) {
  $deleteSQL = sprintf("DELETE FROM staff WHERE staff_id=%s",
                       GetSQLValueString($_GET['staff_id'], "int"));

  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($deleteSQL, $db_conn) or die(mysql_error());
  if($Result1==true)
   {
	   header('location: del_staff.php?res=k');
   }
  else
   {
	   header('location: del_staff.php?res=f');
   }

  $deleteGoTo = "del_staff.php";

  
}

mysql_select_db($database_db_conn, $db_conn);
$query_staff = "SELECT * FROM staff";
$staff = mysql_query($query_staff, $db_conn) or die(mysql_error());
$row_staff = mysql_fetch_assoc($staff);
$totalRows_staff = mysql_num_rows($staff);
?>
<?php
include('sesschk.php');
include('connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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
    <td width="166" s>
    <ul id="MenuBar1" class="MenuBarVertical">
<?php 
include('menu.php');
?>
</ul></td>
    <td width="729" style="text-align:center; vertical-align:top; padding-top:10px; padding-left:20px;">
   <?php
	 if($_GET['res']=="k")
	   {
		   ?>
           <p style="color:#030;" align="left">Successfully Deleted..</p>
           <?php
	   }
	  else if($_GET['res']=="f")
	  {
		  ?>
   <p align="left" style="color:#030;">Failed</p>          
          <?php
	   }
	?>
    <form id="form1" name="form1" method="get" action="del_staff.php">
      <p align="left">
      <span id="spryselect1">
      <select name="staff_id" id="staff_id">
        <?php
do {  
?>
        <option value="<?php echo $row_staff['staff_id']?>"><?php echo $row_staff['staff_username']?></option>
        <?php
} while ($row_staff = mysql_fetch_assoc($staff));
  $rows = mysql_num_rows($staff);
  if($rows > 0) {
      mysql_data_seek($staff, 0);
	  $row_staff = mysql_fetch_assoc($staff);
  }
?>
      </select>
      <span class="selectRequiredMsg">Please select an item.</span></span>
      &nbsp;&nbsp;
       <input type="submit" name="button" id="button" value="Delete" />
       </p>
    </form>

   
    </td>
  </tr>
</table>

  </td>
</tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($staff);
?>
