<?php
include('connection.php');
if($_POST['catid']!="")
  {
	  $query1=mysql_query("select * from registeration where 	sub_category='".$_POST['catid']."'");
	  print("<select style='width:140px;' name='userid' onchange='load_users()'>");
	  while($query2=mysql_fetch_object($query1))
	    {
			print("<option value='".$query2->mailid."'>".$query2->mailid."</option>");
		}
	  print("</select>");
  }
?>
