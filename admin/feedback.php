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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
  $updateSQL = sprintf("UPDATE feedback SET fques=%s WHERE fid=1",GetSQLValueString($_POST['textfield'], "text"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
    $updateSQL = sprintf("UPDATE feedback SET fques=%s WHERE fid=2",GetSQLValueString($_POST['textfield2'], "text"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  $updateSQL = sprintf("UPDATE feedback SET fques=%s WHERE fid=3",GetSQLValueString($_POST['textfield3'], "text"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  $updateSQL = sprintf("UPDATE feedback SET fques=%s WHERE fid=4",GetSQLValueString($_POST['textfield4'], "text"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  $updateSQL = sprintf("UPDATE feedback SET fques=%s WHERE fid=5",GetSQLValueString($_POST['textfield5'], "text"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  $updateSQL = sprintf("UPDATE feedback SET fques=%s WHERE fid=6",GetSQLValueString($_POST['textfield6'], "text"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  $updateSQL = sprintf("UPDATE feedback SET fques=%s WHERE fid=7",GetSQLValueString($_POST['textfield7'], "text"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  $updateSQL = sprintf("UPDATE feedback SET fques=%s WHERE fid=8",GetSQLValueString($_POST['textfield8'], "text"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  $updateSQL = sprintf("UPDATE feedback SET fques=%s WHERE fid=9",GetSQLValueString($_POST['textfield9'], "text"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  $updateSQL = sprintf("UPDATE feedback SET fques=%s WHERE fid=10",GetSQLValueString($_POST['textfield10'], "text"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  $res="sucessfully Updated.";
}

mysql_select_db($database_db_conn, $db_conn);
$query_Recordset1 = "SELECT * FROM feedback WHERE fid = 1";
$Recordset1 = mysql_query($query_Recordset1, $db_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset2 = "SELECT * FROM feedback WHERE fid = 2";
$Recordset2 = mysql_query($query_Recordset2, $db_conn) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset3 = "SELECT * FROM feedback WHERE fid = 3";
$Recordset3 = mysql_query($query_Recordset3, $db_conn) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset4 = "SELECT * FROM feedback WHERE fid = 4";
$Recordset4 = mysql_query($query_Recordset4, $db_conn) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset5 = "SELECT * FROM feedback WHERE fid = 5";
$Recordset5 = mysql_query($query_Recordset5, $db_conn) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset6 = "SELECT * FROM feedback WHERE fid = 6";
$Recordset6 = mysql_query($query_Recordset6, $db_conn) or die(mysql_error());
$row_Recordset6 = mysql_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysql_num_rows($Recordset6);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset7 = "SELECT * FROM feedback WHERE fid = 7";
$Recordset7 = mysql_query($query_Recordset7, $db_conn) or die(mysql_error());
$row_Recordset7 = mysql_fetch_assoc($Recordset7);
$totalRows_Recordset7 = mysql_num_rows($Recordset7);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset8 = "SELECT * FROM feedback WHERE fid = 8";
$Recordset8 = mysql_query($query_Recordset8, $db_conn) or die(mysql_error());
$row_Recordset8 = mysql_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysql_num_rows($Recordset8);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset9 = "SELECT * FROM feedback WHERE fid = 9";
$Recordset9 = mysql_query($query_Recordset9, $db_conn) or die(mysql_error());
$row_Recordset9 = mysql_fetch_assoc($Recordset9);
$totalRows_Recordset9 = mysql_num_rows($Recordset9);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset10 = "SELECT * FROM feedback WHERE fid = 10";
$Recordset10 = mysql_query($query_Recordset10, $db_conn) or die(mysql_error());
$row_Recordset10 = mysql_fetch_assoc($Recordset10);
$totalRows_Recordset10 = mysql_num_rows($Recordset10);

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
    <td width="729" style="text-align:left; vertical-align:top; padding-top:10px; padding-left:10px;">
    <?php 
	 echo($res);
	?>
    <form name="form"  action="<?php echo $editFormAction; ?>" method="POST">
    <table width="623" border="0" cellpadding="00" cellspacing="0">
      <tr>
        <td width="20">1.</td>
        <td width="169"><input name="textfield" type="text" id="textfield" value="<?php echo $row_Recordset1['fques']; ?>" size="80" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">2.</td>
          <td width="169"><input name="textfield2" type="text" id="textfield2" value="<?php echo $row_Recordset2['fques']; ?>" size="80" /></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">3.</td>
          <td width="169"><input name="textfield3" type="text" id="textfield3" value="<?php echo $row_Recordset3['fques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">4.</td>
          <td width="169"><input name="textfield4" type="text" id="textfield4" value="<?php echo $row_Recordset4['fques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">5.</td>
          <td width="169"><input name="textfield5" type="text" id="textfield5" value="<?php echo $row_Recordset5['fques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">6.</td>
          <td width="169"><input name="textfield6" type="text" id="textfield6" value="<?php echo $row_Recordset6['fques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">7.</td>
          <td width="169"><input name="textfield7" type="text" id="textfield7" value="<?php echo $row_Recordset7['fques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">8.</td>
          <td width="169"><input name="textfield8" type="text" id="textfield8" value="<?php echo $row_Recordset8['fques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="24">9.</td>
          <td width="581"><input name="textfield9" type="text" id="textfield9" value="<?php echo $row_Recordset9['fques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">10.</td>
          <td width="169"><input name="textfield10" type="text" id="textfield10" value="<?php echo $row_Recordset10['fques']; ?>" size="80" /></td>
        </tr>
      </table>
      <p align="center"><input type="submit" value="Post Feedback"  /></p>
      <input type="hidden" name="MM_update" value="form" />
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
//-->
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
