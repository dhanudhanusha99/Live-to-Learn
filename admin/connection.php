<?php
$local="localhost";
$user="root";
$ps="";

$db="virtuallrn";
$con=mysql_connect($local,$user,$ps);
if(!$con)
{ die("Could Not Connect Mysql");
}

$con1=mysql_select_db($db,$con);
if(!$con1)
{ die("Could Not Select Database");
}

?>