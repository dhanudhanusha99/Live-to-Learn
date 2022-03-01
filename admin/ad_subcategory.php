<?php
include('sesschk.php');
include('connection.php');
?>
<?php
if(($_POST['catid']!="") and ($_POST['scname']!=""))
   {
		$query1=mysql_query("insert into subcategory values('".$_POST['catid']."','".$id."','".$_POST['scname']."')");
		if(!$query1)
		 {
			 $result="fail";
		 }
		 else
		 {
			 $result="ok";
		 }
	}
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
    <td width="729" style="text-align:center; vertical-align:top; padding-top:50px; padding-left:100px;">
<b><?php
  if($result=="fail")
    {
		print("<p align='left'>Already Exsisting.</p>");
	}
	  if($result=="ok")
    {
		print("<p align='left'>Successfully Added.</p>");
	}
	
?></b>
    <form method="post" action="ad_subcategory.php">
      <table width="334" height="99" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2"><strong>Sub  Category</strong></td>
          </tr>
  <tr>
    <td width="122">Select Category</td>
    <td width="145"><span id="spryselect1">
      <select name="catid" id="select1">
      <option value="">Select</option>
             <?php
	     $query1=mysql_query("select * from category");
		 while($query2=mysql_fetch_object($query1))
		   {
			   print("<option value='".$query2->catid."'>".$query2->catname."</option>");
		   }
	   ?>
      </select>
      <span class="selectRequiredMsg">Select an item.</span></span></td>
  </tr>

        <tr>
          <td width="127">Sub Category Name</td>
          <td width="201"><span id="sprytextfield1">
            <input type="text" name="scname" id="text1" /><br />
            <span class="textfieldRequiredMsg">Enter Category Name.</span></span></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="button" id="button" value="Add Sub Category" /></td>
          </tr>
      </table>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["change"]});
//-->
</script>
</body>
</html>