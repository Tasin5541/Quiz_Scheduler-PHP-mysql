<?php
session_start();

$name='';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$name= '<li class="nav-item">
					<a class="nav-link disabled">' . $_SESSION['username'] . '</a>
				</li>';
}
?>

<?php

$msg='';

if(!empty($_POST)){
	$news_date = $_POST['news_date'];
	$news_topic = $_POST['news_topic'];
	$news_brief = $_POST['news_brief'];
	
		
		$host = 'localhost';   //always same thakbe
		$user = 'root';        //server create korar shomoi username set kora jai.eta db access korar jnno
		$password ='';
		$db='project';
		
		$link = mysqli_connect($host,$user,$password,$db);
		
			$news_sql = "INSERT INTO news (date, topic, brief)
						VALUES ('".$news_date."',
										'".$news_topic."',
										'".$news_brief."'									
										);";
										
			$result = mysqli_query($link,$news_sql) or die(mysqli_error($link));
										
										
			$msg='
				<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>News Updated</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>' ;
						
			mysqli_close($link);
			
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
	<link rel="stylesheet" href="css/admin_news.css" />
	

    <title>NEWS!</title>
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
					<a class="nav-link" href="admin_message.php">MESSAGES</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="admin_quiz.php">QUIZ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="admin_news.php">NEWS</a>
				</li>
				
			</ul>
			
			<ul class="navbar-nav ml-auto">
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
				{
				?>
				<?php echo $name; ?>
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

<div class="form_bg">	
<div class="container">
	<div class="form_middle">
		<div class="d-flex">
			<div class="form_left">
				<div class="center"> 
				<a>
					<img src="images/news.gif" style="width:100%;">
				</a>
				</div>
			</div>
			<div class="flex-fill form_right">
				<div>
					<p class ="form_msg">Update News</p>
				</div>
				
				<?php echo $msg; ?>
				
				<form action="" method="POST" enctype="multipart/form-data">
					
					
					<div class="row">
					<div class="col-lg-6 ">
					<div class="form-group">
						<label >Choose Date : </label>
						<input type="text" id="news_date" name="news_date" class="form-control" placeholder="Eg. YYYY-MM-DD" required/>
					</div>
					</div>
					</div>
					
					<div class="row">
					<div class="col-lg-6 ">
					<div class="form-group">
						<label >Enter Topic : </label>
						<input type="text" id="news_topic" name="news_topic" class="form-control" placeholder="Enter Topic" required/>
					</div>
					</div>
					</div>
					
					
					<div class="form-group">
						<label>Brief : </label>
						<textarea type="text" style="height:150px;" class="form-control" id="quiz_syllabus" placeholder="Describe Briefly" name="news_brief" required></textarea>					
					</div>
					
		
					<div class="row">
					<div class="col-lg-12 ">
						<button type="submit" name = "news_submit" value = "submit" class="btn btn-success">Confirm News</button>
				    </div>
					</div>
				  </form>
			</div>
		</div>
	</div>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login.js"></script>

<script src="js/jq_picker.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="js/picker.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script>
	$('#news_date').datepicker({
		format: 'yyyy-mm-dd',
		uiLibrary: 'bootstrap4'
		
	});
	
</script>
</body>
</html>