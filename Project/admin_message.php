<?php
session_start();

$user_name='';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$user_name= '<li class="nav-item">
					<a class="nav-link disabled">' . $_SESSION['username'] . '</a>
				</li>';
}
				
				
$host = 'localhost';   //always same thakbe
$user = 'root';        //server create korar shomoi username set kora jai.eta db access korar jnno
$password ='';
$db='project';

$link = mysqli_connect($host,$user,$password,$db);

$sql = "SELECT * FROM contact ORDER BY id DESC";
$result = mysqli_query($link,$sql) or die(mysqli_error($link));

$count0=0;
$count1=0;
$ms_no=1;

$non_name=array();
$non_email=array();
$non_date=array();
$non_topic=array();
$non_message=array();

$name=array();
$email=array();
$date=array();
$topic=array();
$message=array();

$noOfData = mysqli_num_rows($result);
while($row = mysqli_fetch_row($result)){
		
	if($row[6]==0)
	{
		$non_name[]=$row[1];
		$non_email[]=$row[2];
		$non_topic[]=$row[3];
		$non_message[]=$row[4];
		$non_date[]=$row[5];
		$count0++;
	}else{
		$name[]=$row[1];
		$email[]=$row[2];
		$topic[]=$row[3];
		$message[]=$row[4];
		$date[]=$row[5];
		$count1++;
	}
}

$sql = "UPDATE contact SET status=1";
$result = mysqli_query($link,$sql) or die(mysqli_error($link));

mysqli_close($link);
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
	<link rel="stylesheet" href="css/admin_message.css" />
	

    <title>MESSAGE!</title>
</head>
<body>

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
					<a class="nav-link active" href="admin_message.php">MESSAGES</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="admin_quiz.php">QUIZ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="admin_news.php">NEWS</a>
				</li>
				
			</ul>
			
			<ul class="navbar-nav ml-auto">
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
				{
				?>
				<?php echo $user_name; ?>
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"></a>
				  
				  <div class="dropdown-content dropdown-menu-right">
					<a class="dropdown-item" href="logout.php">Logout</a>
				  </div>
				<?php } ?>
						
				</li>
				
			</ul>
		</nav>
		</div>
		
		<div class="body">
		
			<?php for($i=0;$i< $count0;$i++){ ?>
		
			<div class="container" style = "background-color:rgb(234, 241, 255, 0.8);">
				<p style ="font-weight:bold;">Message No. : <?php echo $ms_no++ ?></p>
				<br>
				<p style ="font-weight:bold;"><?php echo $non_name[$i] ?></p>
				<p><?php echo $non_email[$i] ?></p>
				<p><?php echo $non_date[$i] ?></p>
				<br>
				<p style ="font-weight:bold;">Topic : <?php echo $non_topic[$i] ?></p>
				<br>
				<p style ="font-weight:bold;">Message :</p>
				<p><?php echo $non_message[$i] ?></p>
			</div>
			
			<?php } ?>
			
			<?php for($i=0;$i< $count1;$i++){ ?>
		
			<div class="container" style = "background-color:rgba(204, 204, 204, 0.8);">
				<p style ="font-weight:bold;">Message No. : <?php echo $ms_no++ ?></p>
				<br>
				<p style ="font-weight:bold;"><?php echo $name[$i] ?></p>
				<p><?php echo $email[$i] ?></p>
				<p><?php echo $date[$i] ?></p>
				<br>
				<p style ="font-weight:bold;">Topic : <?php echo $topic[$i] ?></p>
				<br>
				<p style ="font-weight:bold;">Message :</p>
				<p><?php echo $message[$i] ?></p>
			</div>
			
			<?php } ?>
		</div>
	

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login.js"></script>
</body>
</html>