<?php
include('sesschk.php');
include('connection.php');
?>
<?php
if(isset($_FILES['up']))
 {
   for($i=0;$i<count($_FILES['up']['name']);$i++)
      {
		  if($_POST['typ']=="doc")
		  {
			   if(($_FILES['up']['type'][$i]=="text/plain") or ($_FILES['up']['type'][$i]=="application/msword"))
			   {
			       if(move_uploaded_file($_FILES["up"]["tmp_name"][$i],"../data/document/".$_FILES["up"]["name"][$i]))
				   {
				   mysql_query("insert into uploads values('".$id."','".$_POST['dep']."','".$_POST['sub']."','".$_POST['yea']."','".$_POST['typ']."','".$_FILES["up"]["name"][$i]."','".$_FILES["up"]["type"][$i]."','".$_FILES["up"]["size"][$i]."')",$con);
																																																											                     $result=$result.$_FILES['up']['name'][$i]."&nbsp; Successfully Updated. <br>";
				   }
			   }
			   		  else
		  {

		      $err=$err.$_FILES['up']['name'][$i]."&nbsp; <font color='red'>Type Not Valid.</font> <br>";
		   }
		  }

		   		  if($_POST['typ']=="pdf")
		  {
              $extension=pathinfo($_FILES['up']['name'][$i],PATHINFO_EXTENSION); 
			   if($extension=="pdf")
			   {
			      if( move_uploaded_file($_FILES["up"]["tmp_name"][$i],"../data/pdf/".$_FILES["up"]["name"][$i]))
				  {
				   mysql_query("insert into uploads values('".$id."','".$_POST['dep']."','".$_POST['sub']."','".$_POST['yea']."','".$_POST['typ']."','".$_FILES["up"]["name"][$i]."','".$_FILES["up"]["type"][$i]."','".$_FILES["up"]["size"][$i]."')",$con);
																																																											                     $result=$result.$_FILES['up']['name'][$i]."&nbsp; Successfully Updated. <br>";
				  }
			   }
			   		  else
		  {
		      $err=$err.$_FILES['up']['name'][$i]."&nbsp; <font color='red'>Type Not Valid.</font> <br>";
		   }
		  }

		   		   		  if($_POST['typ']=="htm")
		  {
			   if(($_FILES['up']['type'][$i]=="text/html"))
			   {
			      if(move_uploaded_file($_FILES["up"]["tmp_name"][$i],"../data/html/".$_FILES["up"]["name"][$i]))
				  {
				   mysql_query("insert into uploads values('".$id."','".$_POST['dep']."','".$_POST['sub']."','".$_POST['yea']."','".$_POST['typ']."','".$_FILES["up"]["name"][$i]."','".$_FILES["up"]["type"][$i]."','".$_FILES["up"]["size"][$i]."')",$con);																																		                     $result=$result.$_FILES['up']['name'][$i]."&nbsp; Successfumlly Updated. <br>";
				  }
			   }
			   		  else
					  {
		      $err=$err.$_FILES['up']['name'][$i]."&nbsp; <font color='red'>Type Not 3Valid.</font> <br>";
				   }
		  }
		   if($_POST['typ']=="ppt")
		  {

               $extension=pathinfo($_FILES['up']['name'][$i],PATHINFO_EXTENSION); 
			   if($extension=="ppt")
			   {
			      if(move_uploaded_file($_FILES["up"]["tmp_name"][$i],"../data/ppt/".$_FILES["up"]["name"][$i]))
				  {
				   mysql_query("insert into uploads values('".$id."','".$_POST['dep']."','".$_POST['sub']."','".$_POST['yea']."','".$_POST['typ']."','".$_FILES["up"]["name"][$i]."','".$_FILES["up"]["type"][$i]."','".$_FILES["up"]["size"][$i]."')",$con);																																		                     $result=$result.$_FILES['up']['name'][$i]."&nbsp; Successfumlly Updated. <br>";
				  }
			   }
			   		  else
					  {
		      $err=$err.$_FILES['up']['name'][$i]."&nbsp; <font color='red'>Type Not Valid...</font> <br>";
				   }
		  }



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
    <td width="729" style="text-align:center; vertical-align:top; padding-top:50px; padding-left:100px;">

    <form method="post" action="upload.php" enctype="multipart/form-data">
      <table width="342" height="84" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td height="27" colspan="2"><strong>Upload Section</strong></td>
          </tr>
        <tr>
          <td width="154" height="28" class="lftaln">Department Master</td>
          <td width="182" class="lftaln"><span id="spryselect1">
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
          <td class="lftaln">Select Year</td>
          <td class="lftaln"><span id="spryselect3">
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
          <td class="lftaln">Upload Type</td>
          <td class="lftaln"><span id="spryselect4">
            <select name="typ" id="select4">
            <option value="">Upload Type</option>
            <option value="doc">DOCUMENT</option>
			<option value="htm">HTML</option>
			<option value="pdf">PDF</option>
			<option value="ppt">PPT</option>
            </select>
            <span class="selectRequiredMsg">Select Type.</span></span></td>
        </tr>
        <tr>
          <td class="lftaln">Upload Number</td>
          <td class="lftaln"><span id="sprytextfield1">
          <input type="text" name="text1" id="upn" onchange="load_up()" value="1" />
          <span class="textfieldRequiredMsg">Required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
        </tr>
        <tr>
          <td class="lftaln">Upload Files</td>
          <td id="load_uploads">
          <input type="file" name="up[]"  />
          </td>
        </tr>
        <tr>
          <td colspan="2" class="cenaln"><input type="submit" name="button" id="button" value="Upload" /></td>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["blur", "change"]});

function load_up()
{
var cnt=document.getElementById('upn').value;
var cont="";
for(i=1;i<=cnt;i++)
 {
	 var gen="<input type='file' name='up[]'  /><br>";
    cont=cont+gen;
 }
 document.getElementById('load_uploads').innerHTML=cont;
}
</script>

</body>
</html>