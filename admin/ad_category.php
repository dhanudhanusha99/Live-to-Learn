<?php
include('sesschk.php');
include('connection.php');
?>
<?php
if($_POST['cname']!="")
    {
		$query1=mysql_query("insert into category values('".$d."','".$_POST['cname']."')");
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
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
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
    <form method="post" action="ad_category.php">
      <table width="334" height="99" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2"><strong>Upload Category</strong></td>
          </tr>
        <tr>
          <td width="127">Category Name</td>
          <td width="201"><span id="sprytextfield1">
            <input type="text" name="cname" id="text1" /><br />
            <span class="textfieldRequiredMsg">Enter Category Name.</span></span></td>
        </tr>

        <tr>
          <td colspan="2"><input type="submit" name="button" id="button" value="Add Category" /></td>
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
//-->
</script>
</body>
</html>