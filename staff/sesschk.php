<?php
session_start();
if($_SESSION['staff_username']=="")
 { header('location: index.php?lo=fail');
}

?>