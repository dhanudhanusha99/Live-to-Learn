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

mysql_select_db($database_db_conn, $db_conn);
$query_view_users = "SELECT * FROM registeration ORDER BY stu_id ASC";
$view_users = mysql_query($query_view_users, $db_conn) or die(mysql_error());
$row_view_users = mysql_fetch_assoc($view_users);
$totalRows_view_users = mysql_num_rows($view_users);
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
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
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
    <td width="729" style="text-align:left;vertical-align:top; padding-top:10px; padding-left:10px;"><table width="565" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="59"><strong>S.No</strong></td>
        <td width="129"><strong>First Name</strong></td>
        <td width="141"><strong>Last Name</strong></td>
        <td width="82"><strong>Mail Id</strong></td>
        <td width="74"><strong>Reg No</strong></td>
        <td width="66"><strong>D O B</strong></td>
        </tr>
     
        <?php $i=1; do { ?>
         <tr>
          <td><?php echo($i++); ?></td>
          <td><?php echo $row_view_users['first_name']; ?></td>
          <td><?php echo $row_view_users['Last_name']; ?></td>
          <td><?php echo $row_view_users['mailid']; ?></td>
          <td><?php echo $row_view_users['regno']; ?></td>
          <td><?php echo $row_view_users['dob']; ?></td>
          </tr>
          <?php } while ($row_view_users = mysql_fetch_assoc($view_users)); ?>
    </table></td>
  </tr>
</table>

  </td>
</tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($view_users);
?>
