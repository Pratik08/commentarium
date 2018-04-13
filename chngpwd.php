<?php
session_start();
$user=$_SESSION['user'];
$pwd=$_POST['pwd'];
$old=$_POST['oldpwd'];
$ck=$_POST['repwd'];
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="site"; // Database name
$tbl="user"; // Table name
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$sel="SELECT password FROM user where usr='$user'";
$res=mysql_query($sel);
while($rw=mysql_fetch_assoc($res))
{
  $result=$rw['password'];
}

if($old==$result)
{
if($ck!=$pwd)
{
	$res="false";
}
else
{

$sql=mysql_query("UPDATE `user` SET `password`='$pwd' where `usr`='$user'");
$res="true";
}
}
else
{
	$res="false";

}
redirect("prof.php?pwc=$res");
function redirect($url) 
{
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>