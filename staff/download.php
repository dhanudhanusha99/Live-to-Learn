<?php
include('../Connections/db_conn.php');
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

$colname_dwn = "-1";
if (isset($_GET['dep'])) {
  $colname_dwn = $_GET['dep'];
}
$colname2_dwn = "-1";
if (isset($_GET['sub'])) {
  $colname2_dwn = $_GET['sub'];
}
$colname3_dwn = "-1";
if (isset($_GET['yea'])) {
  $colname3_dwn = $_GET['yea'];
}
$colname4_dwn = "-1";
if (isset($_GET['typ'])) {
  $colname4_dwn = $_GET['typ'];
}
mysql_select_db($database_db_conn, $db_conn);
$query_dwn = sprintf("SELECT * FROM uploads WHERE up_dep = %s and up_sub = %s and year = %s and up_type = %s", GetSQLValueString($colname_dwn, "text"),GetSQLValueString($colname2_dwn, "int"),GetSQLValueString($colname3_dwn, "text"),GetSQLValueString($colname4_dwn, "text"));
//echo($query_dwn);
$dwn = mysql_query($query_dwn, $db_conn) or die(mysql_error());
$row_dwn = mysql_fetch_assoc($dwn);
$totalRows_dwn = mysql_num_rows($dwn);
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
<link href="../style.css" type="text/css" rel="stylesheet" />
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
    <td width="729" style="text-align:center; vertical-align:top; padding-top:50px; padding-left:100px;">

    <form method="get" action="download.php" >
      <table width="342" height="84" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td height="27" colspan="2"><strong>Download Section</strong></td>
          </tr>
        <tr>
          <td width="154" height="28" align="left" class="lftaln">Department Master</td>
          <td width="182" align="left" class="lftaln"><span id="spryselect1">
            <select name="dep" id="dep" onchange="load_sub()">
			<option value="">Select Department</option>
            <?php
			mysql_select_db($database_db_conn, $db_conn);
			  $query1=mysql_query("select * from category",$db_conn);
			  while($query2=mysql_fetch_object($query1))
			     {
				   echo("<option value='".$query2->catid."'>".$query2->catname."</option>");
				 }
			?>
            </select>
            <span class="selectRequiredMsg"> Select Department.</span></span></td>
        </tr>
        <tr>
          <td align="left" class="lftaln">Subject Master</td>
          <td align="left" class="lftaln"><span id="spryselect2">
            <select name="sub" id="select2">
            <option value="">Select Subject</option>
            </select>
            <span class="selectRequiredMsg"> Select Subject.</span></span></td>
        </tr>
        <tr>
          <td align="left" class="lftaln">Select Year</td>
          <td align="left" class="lftaln"><span id="spryselect3">
            <select name="yea" id="select3">
            <option value="">Select Year</option>
            <option value="1">1st Year</option>
            <option value="1">2nd Year</option>
            <option value="1">3rd Year</option>
            <option value="1">4th Year</option>
            <option value="1">5th Year</option>
            </select>
            <span class="selectRequiredMsg"> Select  Year.</span></span></td>
        </tr>
        <tr>
          <td align="left" class="lftaln">Download  Type</td>
          <td align="left" class="lftaln"><span id="spryselect4">
            <select name="typ" id="select4">
              <option value="">Download Type</option>
            <option value="doc">DOCUMENT</option>
			<option value="htm">HTML</option>
			<option value="pdf">PDF</option>
			<option value="ppt">PPT</option>
            </select>
            <span class="selectRequiredMsg">Select Type.</span></span></td>
        </tr>
        <tr>
          <td colspan="2" align="center" class="cenaln"><input type="submit" name="button" id="button" value="View Available Downloads" /></td>
        </tr>
      </table>
   
    </form>
    <?php do { ?>
      <p style="text-align:left; font:Verdana, Geneva, sans-serif bold; font-size:14px; color:#000;">
      <?php if($row_dwn['up_type']=="htm") { $path="html"; } ?>
      <?php if($row_dwn['up_type']=="pdf") { $path="pdf"; } ?>
      <?php if($row_dwn['up_type']=="doc") { $path="document"; } ?>
      <?php if($row_dwn['up_type']=="ppt") { $path="ppt"; } ?>
  <a href="../data/<?php echo($path); ?>/<?php echo $row_dwn['up_fname']; ?>" target="_blank"><?php echo $row_dwn['up_fname']; ?> </a></p>
      <?php } while ($row_dwn = mysql_fetch_assoc($dwn)); ?></td>
  </tr>
</table>

  </td>
</tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur", "change"]});

var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur", "change"]});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["change", "blur"]});
//-->
function getHTTPObject() //object Creation
 { 
   var xmlhttp; 
   if(window.XMLHttpRequest) {   xmlhttp = new XMLHttpRequest();   } 
   else if (window.ActiveXObject) {
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
   if (!xmlhttp)  {   xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); }    } 
   return xmlhttp; 
  }
  var gdet=getHTTPObject();
function load_sub()
{
	if(document.getElementById('dep').value!="")
		 {
			 var dat=document.getElementById('dep').value;
			 var url="../ajax_subc.php";
			 var z='cid='+dat;
			 gdet.open("POST",url,true);
			 gdet.onreadystatechange = stateChanged;
			 gdet.setRequestHeader('content-type','application/x-www-form-urlencoded');
			 gdet.send(z);
		 }
}
function stateChanged()
{
	if(gdet.readyState==4)
	  {
		  if(gdet.status==200)
		    {
		document.getElementById('spryselect2').innerHTML=gdet.responseText+"<span class='selectRequiredMsg'>Select Product.</span>";
		var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur", "change"]});
			}
	  }
}
function load_up()
{
var cnt=document.getElementById('upn').value;
var cont="";
for(i=1;i<=cnt;i++)
 {
	 var gen="<input type='file' name='up[]'  /><br />";
    cont=cont+gen;
 }
 document.getElementById('load_uploads').innerHTML=cont;
}
</script>

</body>
</html>
<?php
mysql_free_result($dwn);
?>
