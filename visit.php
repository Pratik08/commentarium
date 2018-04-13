<!DOCTYPE html>
<html>
<head>

	 <?php
	     session_start();

	     if(!isset($_SESSION['user']))
	     {
	       redirect("home.html");
	     }
	     elseif($_SESSION['user']==$_GET['person'])
	     {
	     	redirect("prof.php");
	     }

	     function redirect($url) {
	     ob_start();
	     header('Location: '.$url);
	     ob_end_flush();
	     die();
	 }

	 ?>
    <title></title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style>
body{
	background-image:url('brown.png');
}
*{
font-size: 20px;
font-family: "Quadranta-Bold";
}
.a{
    margin-left: 30px;
    
}
@font-face {
    font-family:Font;
    src: url(Neuropol.ttf);
    
}
@font-face {
    font-family:Quadranta-bold;
    src: url(Quadranta-bold.otf);  
}
div.xyz{
  background-color:#f1f1f1;border:2px solid #337ab7;border-radius: 6px; margin:5px;padding:3px;  
}
</style>
</head>
<body>
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
		          <input type="text" class="form-control" name="search" placeholder="Search" required>
		        </div>
		        <button type="submit" class="btn btn-default">Search</button>
		      </form>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="prof.php"><?php  echo $_SESSION['user']; ?></a></li>
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
	$user=$_SESSION['user'];

	// Connect to server and select database.
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");

	$person=$_GET['person']
	?>

	 <div class="row">
	 	<div class="col-lg-2 a "style="height:25em;background-color:#333;border-radius:4px;padding:8px;color:#f1f1f1">
	 		<?php
	 		
	 		$sel="SELECT dp FROM user where usr='$person'";
	 		$res=mysql_query($sel);
	 		while($row=mysql_fetch_assoc($res))
	 		{
	 			$result=$row['dp'];
	 		}

	 		
			?>
	 		<img  class="img-responsive" style='border-radius:4px' src='images/<?php echo $result ?>' >
	 		 <?php echo "@".$person;
	 		 $sel="SELECT * FROM user where usr='$person'";
     $res=mysql_query($sel);
     while($row=mysql_fetch_assoc($res))
     {
      $bio=$row['bio'];
      $status=$row['status'];
     }

     echo"<br>bio: ".$bio; 
     echo "<br>status: ".$status;
     ?>
     <br>
	 		 </div>
	<div class="col-lg-6 " style="background-color:#ddd;height:500px;margin: 0 7px 7px 7px;border-radius:7px;overflow:auto;"> 
		<?php
		
    $usr=$_SESSION['user'];
    $sel="SELECT * FROM comm where username='$person'";
    $res=mysql_query($sel);
  while($row=mysql_fetch_assoc($res))
{	
  $u=$row['username'];
  $sel1="SELECT dp FROM user where usr='$u'";
  $res1=mysql_query($sel1);
  while($rw=mysql_fetch_assoc($res1))
  {
    $dp=$rw['dp'];
  }
$person=$row['username'];
 $del=$row['no'];
  echo "<div class=xyz><div class='row'><div class='col-lg-1 col-md-1 col-sm-4 col-xs-4'>";
  echo "<a href='visit.php?person=$person'><img  class='img-responsive thumbnail'style='width:75em;height:auto;border-radius:5px' src='images/$dp'></a> </div>";
  echo "<div class='col-lg-8 col-md-8 col-sm-8 col-xs-8'><a href='visit.php?person=$person'>".$row['username']."</a> :<br/>  ".$row['comment']."</div>";
  if($usr==$row['username'])
{
  echo "<a class='btn btn-info a' href='main.php?delete=$del'>delete</a>";
}
  echo "</div><br></div>";
}


		?>		
	</div>
	<div class="col-lg-3 ">
	</div>
	 </div>
		 	 <script src="js/validator.min.js"></script>
		 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			  <script src="js/bootstrap.min.js"></script>
	</body>
</html>