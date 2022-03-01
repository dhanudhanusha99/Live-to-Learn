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
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form3")) {
$list=implode(",",$_POST['subcat']);
$list="'".$list."'";
  $updateSQL = sprintf("UPDATE staff SET staff_name=%s, staff_mailid=%s, staff_username=%s, staff_password=%s, sub_cat=%s, sub_subcat=%s, staff_comments=%s WHERE staff_id=%s",
                       GetSQLValueString($_POST['staff_name'], "text"),
                       GetSQLValueString($_POST['staff_mailid'], "text"),
                       GetSQLValueString($_POST['staff_username'], "text"),
                       GetSQLValueString($_POST['staff_password'], "text"),
                       GetSQLValueString($_POST['sub_cat'], "text"),
					   $list,
                       GetSQLValueString($_POST['staff_comments'], "text"),
                       GetSQLValueString($_POST['staff_id'], "int"));
  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($updateSQL, $db_conn) or die(mysql_error());
  if($Result1==true)
   {
	   header('location: ed_staff.php?res=k');
   }
  else
   {
	   header('location: ed_staff.php?res=f');
   }
}
mysql_select_db($database_db_conn, $db_conn);
$query_selstaff = "SELECT staff_id, staff_username FROM staff";
$selstaff = mysql_query($query_selstaff, $db_conn) or die(mysql_error());
$row_selstaff = mysql_fetch_assoc($selstaff);
$totalRows_selstaff = mysql_num_rows($selstaff);
mysql_select_db($database_db_conn, $db_conn);
$query_update = "SELECT * FROM staff where staff_id='".$_GET['staff_id']."'";
$update = mysql_query($query_update, $db_conn) or die(mysql_error());
$row_update = mysql_fetch_assoc($update);
$totalRows_update = mysql_num_rows($update);
mysql_select_db($database_db_conn, $db_conn);
$query_category = "SELECT * FROM category";
$category = mysql_query($query_category, $db_conn) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);

$colname_sub_category = "-1";
if (isset($_SERVER['catid'])) {
  $colname_sub_category = $_SERVER['catid'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_sub_category = sprintf("SELECT * FROM subcategory");

$sub_category = mysql_query($query_sub_category, $db_conn) or die(mysql_error());
$row_sub_category = mysql_fetch_assoc($sub_category);
$totalRows_sub_category = mysql_num_rows($sub_category);
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
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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
    <td width="166" s>
    <ul id="MenuBar1" class="MenuBarVertical">
<?php 
include('menu.php');
?>
</ul></td>
    <td width="729" style="text-align:center; vertical-align:top; padding-top:20px; padding-left:10px;">
    <?php
	 if($_GET['res']=="k")
	   {
		   ?>
           <p style="color:#030;" align="left">Successfully Updated..</p>
           <?php
	   }
	  else if($_GET['res']=="f")
	  {
		  ?>
   <p align="left" style="color:#030;">Updation Failed</p>          
          <?php
	   }
	?>
    <form id="form1" name="form1" method="gett" action="ed_staff.php">
    <p align="left">
      <span id="spryselect1" >
<select name="staff_id" id="select1">
<option value=""> Select</option>
  <?php
do {  
?>
  <option value="<?php echo $row_selstaff['staff_id']?>"><?php echo $row_selstaff['staff_username']?></option>
  <?php
} while ($row_selstaff = mysql_fetch_assoc($selstaff));
  $rows = mysql_num_rows($selstaff);
  if($rows > 0) {
      mysql_data_seek($selstaff, 0);
	  $row_selstaff = mysql_fetch_assoc($selstaff);
  }
?>
</select>
<span class="selectRequiredMsg">Select.</span></span>
      <input type="submit" name="button" id="button" value="Edit" /> </p>
    </form><br />
    
      <form action="<?php echo $editFormAction; ?>" method="post" name="form3" id="form3">
        <table align="left">
          <tr valign="baseline">
            <td nowrap="nowrap" align="left">Staff_name:</td>
            <td align="left"><span id="sprytextfield1">
              <input type="text" name="staff_name" value="<?php echo $row_update['staff_name']; ?>" size="32" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="left">Staff_mailid:</td>
            <td align="left"><span id="sprytextfield2">
            <input type="text" name="staff_mailid" value="<?php echo $row_update['staff_mailid']; ?>" size="32" />
            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="left">Staff_username:</td>
            <td align="left"><span id="sprytextfield3">
              <input type="text" name="staff_username" value="<?php echo htmlentities($row_update['staff_username']); ?>" size="32" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="left">Staff_password:</td>
            <td align="left"><span id="sprytextfield4">
              <input type="text" name="staff_password" value="<?php echo $row_update['staff_password']; ?>" size="32" />
              <span class="textfieldRequiredMsg">A value is required.</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="left">Sub_cat:</td>
            <td align="left"><select name="sub_cat" onchange="load_sub()" id="catid">
              <?php 
do {  
?>
              <option value="<?php echo $row_category['catid']?>" <?php if (!(strcmp($row_category['catid'], $row_update['sub_cat']))) {echo "SELECTED";} ?>><?php echo $row_category['catname']?></option>
              <?php
} while ($row_category = mysql_fetch_assoc($category));
?>
            </select></td>
          </tr>
          <tr> </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="left">Sub_subcat:</td>
            <td align="left" id="scateg">
<select name="subcat[]" multiple="multiple">
              <?php 
$list=explode(",",$row_update['sub_subcat']); 
do {  


	

?>
              <option value="<?php echo $row_sub_category['subcatid']?>" <?php 
			  foreach($list as $v)
{
			  if (!(strcmp($row_sub_category['subcatid'],$v))) {echo "SELECTED";} } ?>><?php echo $row_sub_category['subcategory'];

?>

              </option>
              <?php

} while ($row_sub_category = mysql_fetch_assoc($sub_category));
?>
            </select></td>
          </tr>
          <tr> </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="left" valign="top">Staff_comments:</td>
            <td align="left"><textarea name="staff_comments" cols="25" rows="5"><?php echo $row_update['staff_comments']; ?></textarea></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="Update record" /></td>
          </tr>
        </table>
        <input type="hidden" name="staff_id" value="<?php echo $row_selstaff['staff_id']; ?>" />
        <input type="hidden" name="MM_update" value="form3" />
      </form>
      <p>&nbsp;</p>
<p>&nbsp;</p></td>
  </tr>
</table>

  </td>
</tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
//-->
function getHTTPObject() 
  {  var xmlhttp; 
     if(window.XMLHttpRequest) {   xmlhttp = new XMLHttpRequest();   } 
     else if (window.ActiveXObject) {
     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
     if (!xmlhttp)  {   xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); }    } 
     return xmlhttp; 
   } 
var obj1=getHTTPObject();

function load_sub()
{
	var a=document.getElementById('catid').value;
	if(a!="")
	 {
		  parm="catid="+a;
    	  url="ajax_edcategory.php";
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
</script>
</body>
</html>
<?php
mysql_free_result($selstaff);

mysql_free_result($category);

mysql_free_result($update);

mysql_free_result($sub_category);
?>
