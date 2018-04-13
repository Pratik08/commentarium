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
		        <li><a href="prof.php"><?php  session_start(); echo $_SESSION['user']; ?></a></li>
            <li><a href="main.php?logout=true"> logout</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

	<!--/nav-->	
 

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
      </div>
      <div class="modal-body">
		<form id="f2" action="update.php" method="POST" >
			<div >
			  <input type="text" class="form-control" placeholder="Username" name="user" >
			</div>
<br>
			<div >
			  <input type="text-area" class="form-control" placeholder="Bio" name="bio">
			</div>
<br>
			
			<div class="input-group form-control">
			     <span  style="text-align:left;color:#777";font-size:15px;>
			     	<label for="gender" >Male</label>
			       <input type="radio" name="sex" value="male">
			       <br/>
			       <label for="gender">Female</label>
			       <input type="radio" name="sex" value="female">
			     </span>
			     
			   </div>
		
			
		
      </div>
      <div class="modal-footer">
          <div class="dropdown">

          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
            Relationship Status
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" name="rel" role="menu" aria-labelledby="dropdownMenu1">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="prof.php?rel=Married">Married</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="prof.php?rel=Single">single</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="prof.php?rel=In a Relationship">In a Relationship</a></li>
            <li role="presentation"><a role="menuitem" tabindex="-1" href="prof.php?rel=Complicated">Complicated</a></li>
          </ul>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Change dp</button> 
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#fgt">Change Password</button>
        <input type="submit" class="btn btn-primary" value="Save changes">
      </div>
    </div>
  </div>
  </div>
</div>
</form> 

<!---modal-->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
      </div>
      <div class="modal-body">
      <form action="prof.php" id="f1" method="post" enctype="multipart/form-data">
    <h5>Select image to upload:</h5>
    <input type="file" name="fileToUpload" id="fileToUpload" class="btn btn-default" style="height:34px">
    <input type="submit" value="Upload Image" name="submit" class="btn btn-default">

    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Save changes">
      </form>
      </div>
    </div>
  </div>
</div>
<!--/modal-->

<!--forgot password-->
<div class="modal fade" id="fgt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="loginLabel" style="font-family:Verdana">Change Password</h4></div>
        <div class="modal-body"></div>
        <div class="container">
          <p>
            <form  role="form" action="chngpwd.php" method="POST">
              <div class="form-group">
                <input type="password" name="oldpwd" placeholder="Enter old password" class="form-control" style="width:45%" maxlength="20" > <br>
                <input type="password" name="pwd" placeholder="Enter new password" class="form-control" style="width:45%" maxlength="20"> <br>
                <input type="password" name="repwd" placeholder="Re-enter password" class="form-control" style="width:45%"maxlength="20" > <br>
				</div>  <div class="form-group" style="margin-top:-15px">
              </div>
           
          </p>
       </div>
       <div class="modal-footer">
	    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <input type="submit" class="btn btn-success " value="Reset Password" data-toggle="modal" data-target="#err">
		 
                 
		    </form>
      </div>
    </div>
  </div>
</div>
<!--/modal-->

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

$target_dir = "images/";
if(!empty($_FILES['fileToUpload']))
{
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$error="successful";
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$res1="false";

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $res1="false";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    	
    	$img=basename( $_FILES["fileToUpload"]["name"]);
    	$insert="UPDATE user set dp='$img' where usr='$user'";
    	$exec=mysql_query($insert);
    	$res1="true";
        
    } else {
        $res1="false";
    }
}
}
?>

 <div class="row">
 	<div class="col-lg-2 a "style="height:25em;background-color:#333;border-radius:4px;padding:8px;color:#f1f1f1;font-family:Quadranta-Bold">
 		<?php
 		
 		$sel="SELECT * FROM user where usr='$user'";
 		$res=mysql_query($sel);
 		while($row=mysql_fetch_assoc($res))
 		{
 			$result=$row['dp'];
 		}

 		
?>
 		<img  class="img-responsive" style='border-radius:4px' data-toggle='modal' data-target='#myModal' src='images/<?php echo $result ?>' >
 		 <?php 
     $sel="SELECT * FROM user where usr='$user'";
     $res=mysql_query($sel);
     while($row=mysql_fetch_assoc($res))
     {
      $result=$row['name'];
      $bio=$row['bio'];
      $status=$row['status'];
     }

     echo $result;
     echo "<br>@".$_SESSION['user'];
     echo"<br>bio: ".$bio; 
     echo "<br>status: ".$status;
     ?>
     <br>
 		 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal2" >Edit Profile</button>
     <a href="delete.php" class="btn btn-danger"  >Delete Profile</a>
 	</div>
<div class="col-lg-6 " style="background-color:#ddd;height:500px;margin: 0 7px 7px 7px;border-radius:7px;overflow:auto;"> 
  
<?php
    $usr=$_SESSION['user'];
    $sel="SELECT * FROM comm where username='$user'";
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
  echo "<a href='visit.php?person=$person'><img  class='img-responsive'style='width:50px;height:50px;border-radius:5px' src='images/$dp'></a> </div>";
  echo "<div class='col-lg-8 col-md-8 col-sm-8 col-xs-8'><a href='visit.php?person=$person'>@".$row['username']."</a> :<br/>  ".$row['comment']."</div>";
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

<?php
if(isset($res1))
{
if($res1=='true')
{
  echo "<script>alert('Sucessful,display pic Updated')</script>";
}
elseif($res1=='false')
{
  echo "<script>alert('Sorry, your Display pic was not updated.please try again!')</script>";
}
}


if(isset($_GET['pwc']))
{
  if($_GET['pwc']=='true')
    echo "<script>alert('password changed sucessfully!')</script>";
  elseif($_GET['pwc']=='false')
    echo "<script>alert('please check the info entered')</script>";
}


if(isset($_GET['usr']))
{
  if($_GET['usr']=='true')
    echo "<script>alert('profile updated')</script>";
  elseif($_GET['usr']=='false')
    echo "<script>alert('Sorry username taken')</script>";
}


 if(isset($_GET['rel']))
{
  $rel=$_GET['rel'];
  mysql_query("UPDATE `user` SET `status`='$rel' where `usr`='$user'");
}


?>



	 	 <script src="js/validator.min.js"></script>
	 	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		  <script src="js/bootstrap.min.js"></script>
													</body>
			</html>
