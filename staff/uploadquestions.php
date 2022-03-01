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
//$tmp1=implode(",",$_POST['subcat']);
  $insertSQL = sprintf("INSERT INTO questions (question_title, catid, scatid) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['text1'], "text"),
                       GetSQLValueString($_POST['catid'], "text"),$_POST['subcat']);

  mysql_select_db($database_db_conn, $db_conn);   
  $Result1 = mysql_query($insertSQL, $db_conn) or die(mysql_error());
  $rec_id=mysql_fetch_row(mysql_query("select max(qsetid) from questions",$db_conn));
  $tot=$_POST['totq'];
  for($i=0;$i<$tot;$i++)
   { 
     $g1="ques_nam";
	 $g2="ques_ans1"; 
	 $g3="ques_ans2";
	 $g4="ques_ans3";
	 $g5="ques_fans";
     $query=mysql_query("insert into question_set values('','".$rec_id[0]."','".$_POST[$g1][$i]."','".$_POST[$g2][$i]."','".$_POST[$g3][$i]."','".$_POST[$g4][$i]."','".$_POST[$g5][$i]."')",$db_conn);

	 
   }
   $res="Successfully added";
}
mysql_select_db($database_db_conn, $db_conn);
$query_Recordset1 = "SELECT * FROM category ORDER BY catid ASC";
$Recordset1 = mysql_query($query_Recordset1, $db_conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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
    <td width="729" style="vertical-align:top; padding-top:10px; padding-left:10px;"><form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
      <table width="395" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2"><strong>Add Question </strong>
          <font  color="#CC0000">
          <?php 
		  echo($res);
		  ?> </font>
          </td>
          </tr>
        <tr>
          <td width="130">Question Title</td>
          <td width="196"><span id="sprytextfield1">
            <input name="text1" type="text" id="text1" size="40" />
            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
        </tr>
        <tr>
          <td>Category</td>
          <td><span id="spryselect1">
            <select name="catid" id="catid" onchange="load_sub()">
              <option value="">Select</option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['catid']?>"><?php echo $row_Recordset1['catname']?></option>
              <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
            </select>
            <span class="selectRequiredMsg">Please select an item.</span></span></td>
        </tr>
        <tr>
          <td>Sub Category</td>
          <td id="scateg">
            <select name="subcat" id="subcat">
            </select>
</td>
        </tr>
        <tr>
          <td>Total Questions</td>
          <td><span id="spryselect2">
            <select name="totq" id="totq" onchange="load_qs(this.value)">
              <option value="">Select</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
            <span class="selectRequiredMsg">Please select an item.</span></span></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" id="lqqs">&nbsp;</td>
          </tr>
        <tr>
          <td colspan="2" align="center" id="lqqs"><input type="submit" name="button" id="button" value="Submit" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
    </form></td>
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

function load_qs(id)
{
if(id!="")
 {
	var temp="";;
	for(i=1;i<=id;i++)
	{
		var gen="Question"+i+"&nbsp;<input type='text' name='ques_nam[]' size='40'><br>Ans 1:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='ques_ans1[]'><br>Ans 2:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='ques_ans2[]'><br>Ans 3:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='ques_ans3[]'><br>Correct Ans:<input type='text' name='ques_fans[]'> <br> <br>";
		temp=temp+gen;	 
	}
	document.getElementById('lqqs').innerHTML=temp;
 }
}

<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
//-->
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
