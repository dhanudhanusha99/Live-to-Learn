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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) 
{
for($i=1;$i<=10;$i++)
{
  $updateSQL = sprintf("UPDATE eqtest SET eqques=%s, eqans=%s, eqmark=%s WHERE fid=".$i,
                       GetSQLValueString($_POST['eqq'.$i], "text"),
                       GetSQLValueString($_POST['eqqans'.$i], "text"),
                       GetSQLValueString($_POST['eqm'.$i], "text"));

  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  $res="Successfully Updated";
 }
}


mysql_select_db($database_db_conn, $db_conn);
$query_Recordset1 = "SELECT * FROM eqtest WHERE fid = 1";
$Recordset1 = mysql_query($query_Recordset1, $db_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset2 = "SELECT * FROM eqtest WHERE fid = 2";
$Recordset2 = mysql_query($query_Recordset2, $db_conn) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset3 = "SELECT * FROM eqtest WHERE fid = 3";
$Recordset3 = mysql_query($query_Recordset3, $db_conn) or die(mysql_error());
$row_Recordset3 = mysql_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysql_num_rows($Recordset3);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset4 = "SELECT * FROM eqtest WHERE fid = 4";
$Recordset4 = mysql_query($query_Recordset4, $db_conn) or die(mysql_error());
$row_Recordset4 = mysql_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysql_num_rows($Recordset4);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset5 = "SELECT * FROM eqtest WHERE fid = 5";
$Recordset5 = mysql_query($query_Recordset5, $db_conn) or die(mysql_error());
$row_Recordset5 = mysql_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysql_num_rows($Recordset5);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset6 = "SELECT * FROM eqtest WHERE fid = 6";
$Recordset6 = mysql_query($query_Recordset6, $db_conn) or die(mysql_error());
$row_Recordset6 = mysql_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysql_num_rows($Recordset6);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset7 = "SELECT * FROM eqtest WHERE fid = 7";
$Recordset7 = mysql_query($query_Recordset7, $db_conn) or die(mysql_error());
$row_Recordset7 = mysql_fetch_assoc($Recordset7);
$totalRows_Recordset7 = mysql_num_rows($Recordset7);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset8 = "SELECT * FROM eqtest WHERE fid = 8";
$Recordset8 = mysql_query($query_Recordset8, $db_conn) or die(mysql_error());
$row_Recordset8 = mysql_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysql_num_rows($Recordset8);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset9 = "SELECT * FROM eqtest WHERE fid = 9";
$Recordset9 = mysql_query($query_Recordset9, $db_conn) or die(mysql_error());
$row_Recordset9 = mysql_fetch_assoc($Recordset9);
$totalRows_Recordset9 = mysql_num_rows($Recordset9);
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset10 = "SELECT * FROM eqtest WHERE fid = 10";
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
        <td width="169">Question :
          <input name="eqq1" type="text" id="eqq1" value="<?php echo $row_Recordset1['eqques']; ?>" size="80" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Answer : 
          <input name="eqqans1" type="text" id="eqqans1" value="<?php echo $row_Recordset1['eqans']; ?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Mark: 
          <input name="eqm1" type="text" id="eqm1" value="<?php echo $row_Recordset1['eqmark']; ?>" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">2.</td>
          <td width="169">Question :
<input name="eqq2" type="text" id="eqq2" value="<?php echo $row_Recordset2['eqques']; ?>" size="80" /></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Answer 
            <input name="eqqans2" type="text" id="eqqans2" value="<?php echo $row_Recordset2['eqans']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mark 
            <input name="eqm2" type="text" id="eqm2" value="<?php echo $row_Recordset2['eqmark']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">3.</td>
          <td width="169">Question 
            <input name="eqq3" type="text" id="eqq3" value="<?php echo $row_Recordset3['eqques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Answer 
            <input name="eqqans3" type="text" id="eqqans3" value="<?php echo $row_Recordset3['eqans']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mark 
            <input name="eqm3" type="text" id="eqm3" value="<?php echo $row_Recordset3['eqmark']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">4.</td>
          <td width="169">Question 
            <input name="eqq4" type="text" id="eqq4" value="<?php echo $row_Recordset4['eqques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Answer 
            <input name="eqqans4" type="text" id="eqqans4" value="<?php echo $row_Recordset4['eqans']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mark 
            <input name="eqm4" type="text" id="eqm4" value="<?php echo $row_Recordset4['eqmark']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">5.</td>
          <td width="169">Question 
            <input name="eqq5" type="text" id="eqq5" value="<?php echo $row_Recordset5['eqques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Answer 
            <input name="eqqans5" type="text" id="eqqans5" value="<?php echo $row_Recordset5['eqans']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mark 
            <input name="eqm5" type="text" id="eqm5" value="<?php echo $row_Recordset5['eqmark']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">6.</td>
          <td width="169">Question 
            <input name="eqq6" type="text" id="eqq6" value="<?php echo $row_Recordset6['eqques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Answer 
            <input name="eqqans6" type="text" id="eqqans6" value="<?php echo $row_Recordset6['eqans']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mark 
            <input name="eqm6" type="text" id="eqm6" value="<?php echo $row_Recordset6['eqmark']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">7.</td>
          <td width="169">Question 
            <input name="eqq7" type="text" id="eqq7" value="<?php echo $row_Recordset7['eqques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Answer 
            <input name="eqqans7" type="text" id="eqqans7" value="<?php echo $row_Recordset7['eqans']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mark
            <input name="eqm7" type="text" id="eqm7" value="<?php echo $row_Recordset7['eqmark']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">8.</td>
          <td width="169">Question 
            <input name="eqq8" type="text" id="eqq8" value="<?php echo $row_Recordset8['eqques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Answer 
            <input name="eqqans8" type="text" id="eqqans8" value="<?php echo $row_Recordset8['eqans']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mark 
            <input name="eqm8" type="text" id="eqm8" value="<?php echo $row_Recordset8['eqmark']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="24">9.</td>
          <td width="581">Question 
            <input name="eqq9" type="text" id="eqq9" value="<?php echo $row_Recordset9['eqques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Answer 
            <input name="eqqans9" type="text" id="eqqans9" value="<?php echo $row_Recordset9['eqans']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mark 
            <input name="eqm9" type="text" id="eqm9" value="<?php echo $row_Recordset9['eqmark']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="623" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="20">10.</td>
          <td width="169">Question
            <input name="eqq10" type="text" id="eqq10" value="<?php echo $row_Recordset10['eqques']; ?>" size="80" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Answer 
            <input name="eqqans10" type="text" id="eqqans10" value="<?php echo $row_Recordset10['eqans']; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Mark 
            <input name="eqm10" type="text" id="eqm10" value="<?php echo $row_Recordset10['eqmark']; ?>" /></td>
        </tr>
      </table>
      <p align="center"><input type="submit" value="Update EQ"  /></p>
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
