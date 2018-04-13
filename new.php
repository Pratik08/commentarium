<!DOCTYPE html>
<html>
<head>
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
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form
$firstname=$_POST['fname'];
$pwd=$_POST['pwd'];
$email=$_POST['email'];
$dob=$_POST['dob'];
$usr=$_POST['username'];

$emailck="SELECT email from $tbl";
$usrck="SELECT usr FROM $tbl";
$us=mysql_query($usrck);
$em=mysql_query($emailck);
while($row=mysql_fetch_array($em))
{
	if($email==$row['email'])
		$flag=1;
}

while($row=mysql_fetch_array($us))
{
	if($usr==$row['usr']&&$flag==0)
		$flag=2;
}
// Insert data into mysql
if($flag==0)
{
$insert="INSERT INTO $tbl(name, email,usr,password,dob)VALUES('$firstname', '$email', '$usr','$pwd','$dob')";
$result=mysql_query($insert);
}
elseif($flag==1)
{
	$Error="email exists";
}
elseif($flag==2)
{
	$Error="Sorry username alredy taken";
}
// if successfully insert data into database, displays message "Successful".

echo "<BR>";
echo "<div class='container'>
<div class='row'>
<div class='col-lg-8 col-lg-offset-4' style='background-color:#fff;opacity:0.6;height:400px;margin-left:170px;color:grey;border-top-left-radius:10px;border-top-right-radius:10px;'>";
if($result)
{
$_SESSION['user']=$usr;

echo "Welcome ".$firstname;
echo "<br>your username is @".$usr;
echo "<br>We hope you enjoy ";

echo "</div>
</div>

<div class='row'>
<div class='col-lg-8 col-lg-offset-4' style='background-color:#fff;opacity:0.6;font-weight:bold;height:100px;margin-left:170px;border-bottom-left-radius:10px;border-bottom-right-radius:10px'>
<div class='row' style='margin-left:120px'><a class='btn btn-default' href='home.html'>Go back to Login Page</a>
<a class='btn btn-default' href='prof.php'>Go to Your Profile</a>
<a class='btn btn-default' href='main.php'>Go to Your Commentarium</a>
</div>
</div>
</div>
</div>";
}
else{
	echo "Error ".$Error;
	echo "</div>
</div>
</div>";
}


?>

<?php
// close connection
mysql_close();
?>


   <script src="js/validator.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
                          </body>
      </html>