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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
$list= $_POST['subcat'];
  $insertSQL = sprintf("INSERT INTO staff (staff_name, staff_mailid, staff_username, staff_password, sub_cat, sub_subcat, staff_comments) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['staff_name'], "text"),
                       GetSQLValueString($_POST['staff_mailid'], "text"),
                       GetSQLValueString($_POST['staff_username'], "text"),
                       GetSQLValueString($_POST['staff_password'], "text"),
                       GetSQLValueString($_POST['sub_cat'], "text"),
                       GetSQLValueString($list, "text"),
                       GetSQLValueString($_POST['staff_comments'], "text"));

  mysql_select_db($database_db_conn, $db_conn);
  $Result1 = mysql_query($insertSQL, $db_conn) or die(mysql_error());

  $insertGoTo = "ad_staff.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&res=k" : "?res=k";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_db_conn, $db_conn);
$query_category = "SELECT * FROM category";
$category = mysql_query($query_category, $db_conn) or die(mysql_error());
$row_category = mysql_fetch_assoc($category);
$totalRows_category = mysql_num_rows($category);
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
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
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
</ul>
</td>
    <td width="729" align="left" valign="top" style="text-align:center; vertical-align:top; padding-top:10px; padding-left:40px;">

   <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="left">
        <tr valign="baseline">

          <td  colspan="3" style="font:Arial, Helvetica, sans-serif 12px; color:#00F;"><?php 
		   if($_GET['res']=="k")
		     {
                echo("Successfully Added");
			 }
		  ?></td>
        </tr>
        <tr valign="baseline">
          <td colspan="3" align="center" nowrap="nowrap" style="color:#900;">ADD STAFF</td>
          </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="left">Staff_name</td>
          <td><strong>:</strong></td>
          <td><span id="sprytextfield1">
            <input type="text" name="staff_name" value="" size="32" />
            <span class="textfieldRequiredMsg">Required.</span></span></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="left">Staff_mailid</td>
          <td><strong>:</strong></td>
          <td><span id="sprytextfield2">
          <input type="text" name="staff_mailid" value="" size="32" />
          <span class="textfieldRequiredMsg">Required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="left">Staff_username</td>
          <td><strong>:</strong></td>
          <td><span id="sprytextfield3">
            <input type="text" name="staff_username" value="" size="32" />
            <span class="textfieldRequiredMsg"> Required.</span></span></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="left">Staff_password</td>
          <td><strong>:</strong></td>
          <td><span id="sprytextfield4">
            <input type="password" name="staff_password" value="" size="32" />
            <span class="textfieldRequiredMsg">Required.</span></span></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="left">Sub_cat</td>
          <td><strong>:</strong></td>
          <td align="left">
           <select name="sub_cat" id="catid" onchange="load_sub()">
           <option value="">Select</option>
             <?php
	     $query1=mysql_query("select * from category");
		 while($query2=mysql_fetch_object($query1))
		   {
			   print("<option value='".$query2->catid."'>".$query2->catname."</option>");
		   }
	   ?>
       </select>
          </td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="left">Sub_subcat</td>
          <td><strong>:</strong></td>
          <td align="left" id="scateg">
            <select name="subcat" id="subcat" style="width:140px;">
            </select>
          </td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="left" valign="top">Staff_comments</td>
          <td><strong>:</strong></td>
          <td><span id="sprytextarea1">
            <textarea name="staff_comments" cols="25" rows="5"></textarea>
            <span class="textareaRequiredMsg">Required.</span></span></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input type="submit" value="add Staff" /></td>
          <td>&nbsp;</td>
          <td><input type="reset" name="Reset" id="button" value="Reset" /></td>
        </tr>
      </table>
        <input type="hidden" name="MM_insert" value="form1" />
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["blur", "change"]});
</script>
</body>
</html>
<?php
mysql_free_result($category);
?>
