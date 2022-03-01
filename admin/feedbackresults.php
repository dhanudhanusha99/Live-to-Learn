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
$query_category = "SELECT * FROM category ORDER BY catid ASC";
$category = mysql_query($query_category, $db_conn) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);

$colname_shw_feedback = "-1";
if (isset($_GET['userid'])) {
  $colname_shw_feedback = $_GET['userid'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_shw_feedback = sprintf("SELECT * FROM feedbackresults WHERE userid = %s", GetSQLValueString($colname_shw_feedback, "text"));
$shw_feedback = mysql_query($query_shw_feedback, $db_conn) or die(mysql_error());
$row_shw_feedback = mysql_fetch_assoc($shw_feedback);
$totalRows_shw_feedback = mysql_num_rows($shw_feedback);
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
    <td width="729" style="text-align:left; vertical-align:top; padding-top:10px; padding-left:10px;"><form id="form1" name="form1" method="get" action="feedbackresults.php">
      <table width="262" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="116">Category</td>
          <td width="140"><span id="spryselect1">
            <select name="catid" id="catid" onchange="load_sub()">
              <option value="">Select</option>
              <?php
do {  
?>
              <option value="<?php echo $row_category['catid']?>"><?php echo $row_category['catname']?></option>
              <?php
} while ($row_category = mysql_fetch_assoc($category));
  $rows = mysql_num_rows($category);
  if($rows > 0) {
      mysql_data_seek($category, 0);
	  $row_category = mysql_fetch_assoc($category);
  }
?>
            </select>
            <span class="selectRequiredMsg">Please select an item.</span></span></td>
        </tr>
        <tr>
          <td>Sub Category</td>
          <td id="scateg">&nbsp;</td>
        </tr>
        <tr>
          <td>Users</td>
          <td id="lusers">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="button" id="button" value="Show Feedbak" /></td>
        </tr>
      </table>
    </form>
    <br />
    <table width="412" border="1" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="3"><?php 
				if($_GET['userid']!="")
				 {
				echo("&nbsp;".$_GET['userid']."&nbsp;Feedback Results.");
				 }
				?></td>
                              </tr>
        <?php $i=1;
		if($totalRows_shw_feedback > 0)
		 {
		do { ?>
              <tr>
          <td width="19"><?php echo($i++); ?>.</td>
          <td width="252">&nbsp;&nbsp;<?php echo $row_shw_feedback['fques']; ?></td>
          <td width="133">&nbsp;&nbsp;<?php echo $row_shw_feedback['fand']; ?></td>
                </tr>
          <?php } while ($row_shw_feedback = mysql_fetch_assoc($shw_feedback)); 
		 }
		 else
		 {
			 echo("No Feedback Found");
		 }
		  ?>

    </table></td>
  </tr>
  <tr>
    <td s>&nbsp;</td>
    <td style="text-align:left; vertical-align:top; padding-top:10px; padding-left:10px;">&nbsp;</td>
  </tr>
      </table>

  </td>
</tr>
</table>
<script type="text/javascript">
function getHTTPObject() 
  {  var xmlhttp; 
     if(window.XMLHttpRequest) {   xmlhttp = new XMLHttpRequest();   } 
     else if (window.ActiveXObject) {
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
     if (!xmlhttp)  {   xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); }    } 
     return xmlhttp; 
   } 
var obj1=getHTTPObject();
var obj2=getHTTPObject();

function load_sub()
{
	var a=document.getElementById('catid').value;
	if(a!="")
	 {
		  parm="catid="+a;
    	  url="ajax_edcategory1.php";
		  obj1.open("POST",url,true);
		  obj1.onreadystatechange = stateChanged;
		  obj1.setRequestHeader('content-type','application/x-www-form-urlencoded');
		  obj1.send(parm);
	 }
	 else
	 {
		 document.getElementById('scateg').innerHTML="";
		 }
	 
}
function stateChanged()
{
  	  if (obj1.readyState == 4) 
        { 
       if(obj1.status==200) 
	     { 
		 document.getElementById('scateg').innerHTML=obj1.responseText;
		 }  
	   } 
}
function load_users(scatid)
{
	var a=document.getElementById('catid').value;
	if(a!="")
	 {
		  parm="catid="+scatid;
    	  url="ajax_users.php";
		  obj2.open("POST",url,true);
		  obj2.onreadystatechange = stateChanged1;
		  obj2.setRequestHeader('content-type','application/x-www-form-urlencoded');
		  obj2.send(parm);
	 }
	 else
	 {
		 document.getElementById('lusers').innerHTML="";
		 }
	 
}
function stateChanged1()
{
  	  if (obj2.readyState == 4) 
        { 
       if(obj2.status==200) 
	     { 
		 document.getElementById('lusers').innerHTML=obj2.responseText;
		 }  
	   } 
}

<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($category);

mysql_free_result($shw_feedback);
?>
