<?php
include('connection.php');
if($_POST['catid']!="")
  {
	  $query1=mysql_query("select * from subcategory where catid='".$_POST['catid']."'");
	  print("<select style='width:140px;' name='subcat'  onchange='load_users(this.value)'>");
	  print("<option>Select</option>");
	  while($query2=mysql_fetch_object($query1))
	    {
			print("<option value='".$query2->subcatid."'>".$query2->subcategory."</option>");
		}
	  print("</select>");
  }
?>
