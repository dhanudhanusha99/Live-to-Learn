<?php require_once('../Connections/db_conn.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php?log=f";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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
$query_student_list = "SELECT * FROM chatusers WHERE type = 'student' ORDER BY uname ASC";
$student_list = mysql_query($query_student_list, $db_conn) or die(mysql_error());
$row_student_list = mysql_fetch_assoc($student_list);
$totalRows_student_list = mysql_num_rows($student_list);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/chat.js"></script>
<link type="text/css" rel="stylesheet" media="all" href="../css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="../css/screen.css" />
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>
<link href="../style.css" type="text/css" rel="stylesheet" />
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  height="100%" class="maintable" >
<tr>
  <td align="center">
      <table width="900" border="0" height="900" >
  <tr>
    <td height="91"  colspan="2"><img src="../images/banner.jpg" width="899" height="118" /></td>
    </tr>
  <tr>
    <td width="166" valign="top" ><ul id="MenuBar1" class="MenuBarVertical">
  
    </ul>
      <ul id="MenuBar2" class="MenuBarVertical">
      <?php include_once('menu.php'); ?>
      </ul></td>
    <td width="729" align="center" style="text-align:center; vertical-align:top; padding-top:20px; padding-left:10px;">
    <div id="main_container" style=" text-align:left;">

      <?php $i=1; do { echo $i++;?>.
        <a href="javascript:void(0)" onClick="javascript:chatWith('<?php echo $row_student_list['uname']; ?>')">Chat with:
        <?php
		mysql_select_db($database_db_conn, $db_conn);
		$query1=mysql_fetch_row(mysql_query("select * from registeration where mailid='". $row_student_list['uname']."'"));
		echo("<u></u>&nbsp;:&nbsp;".$query1[1].$query1[2]."&nbsp;<u></u>:&nbsp;".$query1[7]);
		?>
        </a>
        <br />
        <?php } while ($row_student_list = mysql_fetch_assoc($student_list));
		
		if($totalRows_student_list==0)
		{
			echo("No Students available to chat.");
	    }
		?>
<!-- YOUR BODY HERE -->

</div>

    
    </td>
  </tr>
</table>

  </td>
</tr>
</table>
<script type="text/javascript">
<!--
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($student_list);
?>
