<?php
session_start();

$name='';
$lmsg='';
$success= 0;
$admin_panel='';

if(!empty($_POST['l_submit']))   //submit na kora prjnto etar kaj hbe na
{
$host = 'localhost';   //always same thakbe
$user = 'root';        //server create korar shomoi username set kora jai.eta db access korar jnno
$password ='';
$db='project';

$link = mysqli_connect($host,$user,$password,$db);

//data query
$email = $_POST['email'];
$pass = md5($_POST['password']);  //db er encoded pass er sthe ei pass o encode kore milaite hbe
$sql = 'SELECT * FROM user WHERE email = "'.$email.'"';
$result = mysqli_query($link,$sql) or die(mysqli_error($link));

//data fetch
$noOfData = mysqli_num_rows($result);
while($row = mysqli_fetch_row($result)){
	if($row[4] == $pass && $row[9] == 1){
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $row[1] ;
		$_SESSION['admin'] = true;
		
		header("Location: admin_message.php");
	}
		
	
	else if($row[4] == $pass){
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $row[1] ;
		$success=1;
		
		$lmsg='
		<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong> logged In Successfully</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>' ;
	}

}

mysqli_close($link);

if($success==0) {
		$lmsg='
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong> log In Unsuccessfull</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>' ;
	}
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$name= '<li class="nav-item">
					<a class="nav-link disabled">' . $_SESSION['username'] . '</a>
				</li>';
				
	$msg='';
}

if(isset($_SESSION['admin'])){
	$admin_panel='<li class="nav-item">
					<a class="nav-link" href="admin_message.php">ADMIN PANEL</a>
				</li>';
}
?>

<?php

if(empty($_POST['c_submit']))
		$msg='';
	
if(!empty($_POST['c_submit']))   //submit na kora prjnto etar kaj hbe na
{
	$first_name = $_POST['first_name'];
	$email = $_POST['email'];
	$topic = $_POST['topic'];
	$message = $_POST['message'];
	
	if(!empty($first_name) && !empty($email) && !empty($topic) && !empty($message)){
		$host = 'localhost';   //always same thakbe
		$user = 'root';        //server create korar shomoi username set kora jai.eta db access korar jnno
		$password ='';
		$db='project';
		
		$link = mysqli_connect($host,$user,$password,$db);
		
		$sql = "INSERT INTO contact (name, email, topic, message, datetime)
					VALUES ('".$first_name."', 
									'".$email."', 
									'".$topic."', 
									'".$message."', 
									now());";
		$result = mysqli_query($link,$sql) or die(mysqli_error($link));
		 
		
		$msg='
		<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Successfully Submitted</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>' ;

		//die;   //erpr r code run hbe na
	}
	
	else {
		$msg='
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>fill up all the fields</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>' ;
	}
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/contact.css" />

    <title>CONTACT!</title>
</head>
<body>
<!--code starts from here-->
<div>
	<!-- navbar -->
	<div class="home_block1">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
			<!-- Brand/logo -->
			<a class="navbar-brand" href="home.php">
				<img src="images/aust_logo.png" alt="Logo" style="width:40px;">
			</a>
	  
			<!-- Links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="home.php">HOME</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">SCHEDULE</a>
					<div class="dropdown-content">
						<a class="dropdown-item" href="cse.php">CSE</a>
						<a class="dropdown-item" href="eee.php">EEE</a>
						<a class="dropdown-item" href="civil.php">CIVIL</a>
						<a class="dropdown-item" href="archi.php">ARCHITECTURE</a>
						<a class="dropdown-item" href="mecha.php">MECHANICAL</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="contact.php">CONTACT</a>
				</li>
				<?php echo $admin_panel?>
				
			</ul>
			
			<ul class="navbar-nav ml-auto">
				<?php if( !isset($_SESSION['username']) && empty($_SESSION['username']) )
				{
				?>
				<button onclick="document.getElementById('id01').style.display='block'" class="navbar-brand">
					<img src="images/account_icon.png" alt="Logo" style="width:40px;">
				</button>
				<?php }else{
						echo $name; ?>
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"></a>
				  
				  <div class="dropdown-content dropdown-menu-right">
					<a class="dropdown-item" href="logout.php">Logout</a>
				  </div>
				</li>
				<?php } ?>
			</ul>
		</nav>
	</div>
	
	<!--Login-->
	<div id="id01" class="modal">
  
  <form class="modal-content animate" method="POST" enctype="multipart/form-data" action="">
    <div class="imgcontainer">
      <span id="x_btn" onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/account_icon.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" id="l_email" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" id="password" placeholder="Enter Password" name="password" required>
        
      <button name = "l_submit" value = "submit" class="login_btn" type="submit">Login</button>
    </div>

    <div class="container-fluid" style="background-color:#f1f1f1">
		<div class="container" >
		  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		  <span class="psw">Don't Have An Account? <a href="registration.php">sign up</a></span>
		</div>
	</div>
  </form>
</div>
	
</div>
<div class="contact_bg">
	<div class="contact_middle">
		<div class="d-flex">
			<div class="contact_left">
				<div class="center"> 
				<a href="https://www.facebook.com/AUST.BD/">
					<img src="images/fb_icon.png" style="width:70px;">
				</a>
				<a href="#">
					<img src="images/twitter_icon.png" style="width:70px;">
				</a>
				<a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=info@aust.edu&su=Hello&shva=1">
					<img src="images/google_icon.png" style="width:70px;">
				</a>
				</div>
			</div>
			<div class="flex-fill contact_right">
				<?php echo $msg; ?>
				<?php echo $lmsg; ?>
				<div>
					<p class ="contact_msg">What's On Your Mind?</p>
				</div>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					  <label for="name">Tell Us Your Name:</label>
					  <input type="text" class="form-control" id="first_name" placeholder="Name" name="first_name" required>
					</div>
					
					<div class="form-group">
					  <label for="email">Enter Email:</label>
					  <input type="email" class="form-control" id="email" placeholder="Eg. example@email.com" name="email" required>
					</div>
					
					<div class="form-group">
					  <label for="topic">Topic:</label>
						  <select name="topic" class="form-control">
								<option selected>Choose Topic</option>
								<option value="QUIZ">QUIZ</option>
								<option value="UNIVERSITY">UNIVERSITY</option>
								<option value="TEACHER">TEACHER</option>
								<option value="ABSENCE">ABSENCE</option>
								<option value="OTHER">OTHER</option>
						  </select>
					</div>
					
					<div class="form-group">
					  <label for="message">Message:</label>
					  <textarea type="text" class="form-control" id="message" placeholder="Write Us a Message" name="message" required></textarea>
					</div>
					<button type="submit" name = "c_submit" value = "submit" class="btn btn-success">Send Message</button>
				  </form>
			</div>
		</div>
	</div>
</div>
<div class="contact_end">
	
		
		<div>
			<p>FIND US HERE >></p>
			<iframe src="https://www.google.com/maps/embed?pb=
			!1m18!1m12!1m3!1d3651.538839500695!2d90.40469681416094!3d23.
			76381908458276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c77decb5f845
			%3A0xc2eadd2f3b867792!2sAhsanullah+University+of+Science+and+Technology!5e0!3m2!
			1sen!2sbd!4v1532666158682" 
			width="100%" height="200px" frameborder="0" style="border:0" allowfullscreen>
			</iframe>
		</div>
	
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login.js"></script>
</body>
</html>