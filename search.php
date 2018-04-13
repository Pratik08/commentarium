<!DOCTYPE html>
<html>
<head>
       <title>Search</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="js/validator.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
*{
font-size: 20px;
font-family: "Quadranta-Bold";
}
div.xyz{
  background-color:#f1f1f1;border:2px solid #337ab7;border-radius: 6px; margin:5px;padding:3px;  
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
<body style=" background-image:url('brown.png');">
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
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

  <!--/nav--> 

<div class="container" >

<?php
session_start();

    if(!isset($_SESSION['user']))
    {
      redirect("home.html");
    }elseif(isset($_GET['logout']))
    {
      session_destroy();
      redirect("home.html");
    }

    function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="site"; // Database name
$tbl="comm"; // Table name
$search=$_POST['search'];
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$usr=$_SESSION['user'];
$sql=mysql_query("SELECT * FROM $tbl WHERE comment like '%$search%';");
while($row=mysql_fetch_assoc($sql))
{
  $u=$row['username'];
  $sel="SELECT dp FROM user where usr='$u'";
  $res=mysql_query($sel);
  while($rw=mysql_fetch_assoc($res))
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
</body>
</html>