<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
	 
    <title></title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style>

*{
font-size: 20px;
font-family: "Quadranta-Bold";
}
@font-face {
    font-family:Font;
    src: url(Neuropol.ttf);
    
}
@font-face {
    font-family:Quadranta-bold;
    src: url(Quadranta-bold.otf);  
}
</style>
</head>
<body style="	background-image:url('back.jpg');">
<!---nav-->	
		<nav class="navbar navbar-inverse " >
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navb">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="home.html" style="font-family:Font">Commentarium</a>
		    </div>
		    <div class="collapse navbar-collapse" id="navb">
		      
		      <form class="navbar-form navbar-left" role="search" action="search.php" method="POST">
		        <div class="form-group">
		          <input type="text" class="form-control" name="search" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default">Search</button>
		      </form>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#">Link</a></li>
		        
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

	<!--/nav-->	

<?php
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="site"; // Database name
$tbl="user"; // Table name
$flag=0;
$result=0;
$message="ERROR";
$_SESSION['user']="anonymous";
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$email=$_POST['email'];
$pwd=$_POST['pwd'];


$sql1="SELECT email from $tbl";
$sqlobj1=mysql_query($sql1);
while($row=mysql_fetch_assoc($sqlobj1))
{
	if($email==$row['email'])
	{
		$flag=1;
	}
}
if($flag==1)
{
	$sql4="SELECT usr FROM $tbl where email='$email'";
	$sqlobj4=mysql_query($sql4);
	while($row=mysql_fetch_assoc($sqlobj4))
	{
		$_SESSION['user']=$row['usr'];
	}

}

if($flag==0)
{
	
$sql2="SELECT usr from $tbl";
$sqlobj2=mysql_query($sql2);

while($row=mysql_fetch_assoc($sqlobj2))
{
	if($row['usr']==$email)
	{
		$flag=1;
		$_SESSION['user']=$email;
		break;
	}
}
}
if($flag==0)
{
	$message="username/email doesn't exist";
}
elseif($flag==1)
{
	$sql3="SELECT password From $tbl where email='$email' or usr='$email'";
	$sqlobj3=mysql_query($sql3);
	while($row=mysql_fetch_assoc($sqlobj3)) 
	{
		if($pwd==$row['password'])
			$result=1;
	}
	if($result==1)
	{
		redirect("main.php");
	}
	else
		{
			$message="username & password doesn't match";
			session_destroy();
		}
}

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>

<div class="container">
	<div class="row" > 
		<div class="col-md-offset-4 col-md-3 col-lg-offset-4 col-lg-3 col-xs-offset-3" style="margin-top:160px;border-radius:7px;border:2px solid #444;padding:20px;padding-top:50px;background-color:#333;height:220px">
		<span style="color:white;text-align:center;font-family:Quadranta-Bold">
			<?php

				echo $message;
			?>
		</span>
		</div>
	</div>
</div>


<script src="js/validator.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
                       </body>
   </html>