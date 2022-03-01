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
$query_results = "SELECT * FROM question_ans ORDER BY user_id ASC";
$results = mysql_query($query_results, $db_conn) or die(mysql_error());
$row_results = mysql_fetch_assoc($results);
$totalRows_results = mysql_num_rows($results);

$colname_Recordset2 = "-1";
if (isset($_GET['qsetid'])) {
  $colname_Recordset2 = $_GET['qsetid'];
}



?>
<?php
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
    <td width="166" style="vertical-align:top;">
    <ul id="MenuBar1" class="MenuBarVertical">
<?php 
include('menu.php');
?>
</ul></td>
    <td width="729" style="text-align:left; vertical-align:top; padding-top:10px; padding-left:10px;"><table width="699" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="96"><strong>User</strong></td>
        <td width="144"><strong>Question Set</strong></td>
        <td width="134"><strong>Question</strong></td>
        <td width="145"><strong>Correct Answer</strong></td>
        <td width="111"><strong>User Answer</strong></td>
        <td width="55"><strong>Result</strong></td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_results['user_id']; ?></td>
          <td><?php 
		mysql_select_db($database_db_conn, $db_conn);
$query_Recordset1 = "SELECT * FROM questions WHERE qsetid = '".$row_results['qset_id']."'";
$Recordset1 = mysql_query($query_Recordset1, $db_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
		
		echo($row_Recordset1['question_title']); ?></td>
          <td><?php 
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset2 = sprintf("SELECT * FROM question_set WHERE ques_atid = '".$row_results['qus_id']."'");
$Recordset2 = mysql_query($query_Recordset2, $db_conn) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
		
		echo $row_Recordset2['question']; ?></td>
          <td><?php echo $row_results['qus_ans']; ?></td>
          <td><?php echo $row_results['usr_ans']; ?></td>
          <td><?php echo $row_results['qus_crt']; ?></td>
        </tr>

        <?php } while ($row_results = mysql_fetch_assoc($results)); ?>
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
mysql_free_result($results);

mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
