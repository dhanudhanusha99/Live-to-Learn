<?php
include('connection.php');

if($_POST['cid']!="")
{
  $query1=mysql_query("select * from uploads where up_sub='".$_POST['cid']."'");


  while($query2=mysql_fetch_object($query1))
    {
?>
<input type="checkbox" name="flistid[]" value="<?php echo($query2->up_id); ?>" /><?php echo($query2->up_fname); ?> <br />
<?php
	}  

}

?>