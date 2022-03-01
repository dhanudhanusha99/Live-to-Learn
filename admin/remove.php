<?php
include('sesschk.php');
include('connection.php');
?>
<?php
if(isset($_POST['flistid']))
{
	$list=$_POST['flistid'];
	foreach($list as $v)
	{
		$query1=mysql_fetch_object(mysql_query("select * from uploads where up_id='".$v."'"));
		$path="../data/".$query1->up_fname;

		  unlink($path);

                     $result=$result.$query1->up_fname."&nbsp; Successfully Deleted. <br>";
					 mysql_query("delete  from uploads where up_id='".$v."'");
	}
}
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
    <td width="729" style="text-align:center; vertical-align:top; padding-top:50px; padding-left:100px;">

    <form method="post" action="remove.php" >
      <table width="530" height="84" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td height="27" colspan="2"><strong>Upload Section</strong></td>
          </tr>
        <tr>
          <td width="130" height="28" class="lftaln">Category Master</td>
          <td width="394" class="lftaln"><span id="spryselect1">
            <select name="dep" id="dep" onchange="load_sub()">
			<option value="">Select Department</option>
            <?php
			  $query1=mysql_query("select * from category");
			  while($query2=mysql_fetch_object($query1))
			     {
				   echo("<option value='".$query2->catid."'>".$query2->catname."</option>");
				 }
			?>
            </select>
            <span class="selectRequiredMsg"> Select Department.</span></span></td>
        </tr>
        <tr>
          <td class="lftaln">Subject Master</td>
          <td class="lftaln"><span id="spryselect2">
            <select name="sub" id="select2">
            <option value="">Select Subject</option>
            </select>
            <span class="selectRequiredMsg"> Select Subject.</span></span></td>
        </tr>
        <tr>
          <td class="lftaln">Delete files</td>
          <td id="load_uploads">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" class="cenaln"><input type="submit" name="button" id="button" value="Delete" /></td>
          </tr>
      </table>

    </form>
    <p style="text-align:left; font:Verdana, Geneva, sans-serif bold; font-size:14px; color:#000;">
    <?php 
	   echo("<b>".$result."</b>");
	?>
    </p>
    <p style="text-align:center; font:Verdana, Geneva, sans-serif; font-size:14px;">
    <?php 
	   echo("<b>".$err."</b>");
	?>
    </p>
    </td>
  </tr>
</table>

  </td>
</tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur", "change"]});
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
  var gdet1=getHTTPObject();
function load_sub()
{
	if(document.getElementById('dep').value!="")
		 {
			 var dat=document.getElementById('dep').value;
			 var url="ajax_subc.php";
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
function flist()
{

  var dat=document.getElementById('select2').value;
  if(dat!="")
   {
			 var url="ajax_flist.php";
			 var z='cid='+dat;
			 gdet1.open("POST",url,true);
			 gdet1.onreadystatechange = stateChanged2;
			 gdet1.setRequestHeader('content-type','application/x-www-form-urlencoded');
			 gdet1.send(z);
   }
}
function stateChanged2()
{

	if(gdet1.readyState==4)
	  {
		  if(gdet1.status==200)
		    {

		document.getElementById('load_uploads').innerHTML=gdet1.responseText;
			}
	  }
}
</script>

</body>
</html>