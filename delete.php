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
<body style="	background-image:url('brown.png');">
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
		      <a class="navbar-brand" href="main.php" style="font-family:Font">Commentarium</a>
		    </div>
		    <div class="collapse navbar-collapse" id="navb">
		      
		      <form class="navbar-form navbar-left" role="search" action="search.php" method="POST">
		        <div class="form-group">
		          <input type="text" class="form-control" name="search" placeholder="Search">
		        </div>
		        <button type="submit" class="btn btn-default">Search</button>
		      </form>
		      <ul class="nav navbar-nav navbar-right">
            <li><a href="prof.php"><?php  session_start(); echo $_SESSION['user']; ?></a></li>
            <li><a href="main.php?logout=true"> logout</a></li>

          </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

	<!--/nav-->	

<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="site"; // Database name
$tbl="user"; // Table name
$flag=0;
$result=0;
$user=$_SESSION['user'];
$message="We Are Sorry to see you leave<br>Are you sure you wish to leave<br>";
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");



function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>

<div class="container">
	<div class="row" > 
		<div class="col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4 col-xs-offset-3" style="margin-top:160px;border-radius:7px;border:2px solid #444;padding:20px;padding-top:50px;background-color:#333;height:220px">
		<span style="color:white;text-align:center;font-family:Quadranta-Bold">
			<?php

				echo $message;
			?>
		</span>
		<br>
			<a href="delete.php?conf=yes" class="btn btn-danger" >YES</a>
			<a href="delete.php?conf=no" class="btn btn-success"  >NO</a>
		</div>
	</div>
</div>

<?php

if(isset($_GET['conf']))
{
	$conf=$_GET['conf'];
	if($conf=='no')
	{
		redirect("main.php");
	}
	elseif($conf=='yes')
	{
		$result=mysql_query("DELETE FROM `comm` WHERE `username`='$user'");
		$result=mysql_query("DELETE FROM `user` WHERE `usr`='$user'");
		session_destroy();
		redirect('home.html');
	}
}

?>


<script src="js/validator.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
                       </body>
   </html>