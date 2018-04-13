<?php
session_start();
$user=$_SESSION['user'];
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="site"; // Database name
$tbl="user"; // Table name
$flag=0;

 function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}


mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


if(isset($_POST['bio']))
{
	$bio=$_POST['bio'];
	if(!empty($bio))
	{
	mysql_query("UPDATE `user` SET `bio`='$bio' where `usr`='$user'");
	}
}

if(isset($_POST['sex']))
{
	$sex=$_POST['sex'];
	if(!empty($sex))
	{
	mysql_query("UPDATE `user` SET `gender`='$sex' where `usr`='$user'");
	}
}




if(isset($_POST['user']))
{
$usr=$_POST['user'];

$usrck="SELECT usr FROM $tbl";
$us=mysql_query($usrck);
while($row=mysql_fetch_array($us))
{
	if($usr==$row['usr'])
		$flag=1;
}
if($flag!=1&&!empty($usr))
{
$sql=mysql_query("UPDATE `user` SET `usr`='$usr' where `usr`='$user'");
$_SESSION['user']=$usr;
mysql_query("UPDATE `comm` SET `username`='$usr' where `username`='$user'");
redirect("prof.php?usr=true");
}
elseif($flag==1)
redirect("prof.php?usr=false");
}

redirect("prof.php?usr=true");