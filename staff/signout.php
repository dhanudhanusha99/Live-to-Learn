<?php require_once('../Connections/db_conn.php'); ?>
<?php
// *** Logout the current user.
$logoutGoTo = "index.php?lout=k";
if (!isset($_SESSION)) {
  session_start();
}
 mysql_select_db($database_db_conn, $db_conn);
 mysql_query("delete from  chatusers  where uname='".$_SESSION['MM_Username']."' and  type='staff'");
$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>