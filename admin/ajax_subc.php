<?php
include('connection.php');
if($_POST['cid']!="")
{
  $query1=mysql_query("select * from subcategory where catid='".$_POST['cid']."'");
  echo("<select name='sub' id='select2'>
        <option value=''>Select Subject</option>");
  while($query2=mysql_fetch_object($query1))
    {
		echo("<option value='".$query2->subcatid."'>".$query2->subcategory."</option>");
	}  
    echo("</select>");
}
?>