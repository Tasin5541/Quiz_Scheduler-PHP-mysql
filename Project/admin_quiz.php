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
	$quiz_depertment = $_POST['quiz_depertment'];
	$quiz_year = $_POST['quiz_year'];
	$quiz_semester = $_POST['quiz_semester'];
	$quiz_sec = $_POST['quiz_sec'];
	$quiz_date = $_POST['quiz_date'];
	$quiz_time = $_POST['quiz_time'];
	$quiz_subject = $_POST['quiz_subject'];
	$quiz_no = $_POST['quiz_no'];
	$quiz_syllabus = $_POST['quiz_syllabus'];
	
	if($quiz_depertment !== "Choose Department" && $quiz_year !== "Choose Year" 
	&& $quiz_semester !== "Choose Semester" && $quiz_sec !== "Choose Section"){
		
		$host = 'localhost';   //always same thakbe
		$user = 'root';        //server create korar shomoi username set kora jai.eta db access korar jnno
		$password ='';
		$db='project';
		
		$link = mysqli_connect($host,$user,$password,$db);
		
		$quiz_seek_sql = "SELECT * FROM quiz WHERE date = '".$quiz_date."' AND time = '".$quiz_time."'
									AND department = '".$quiz_depertment."' AND year = '".$quiz_year."'
									AND semester = '".$quiz_semester."' AND section = '".$quiz_sec."'";
		$result = mysqli_query($link,$quiz_seek_sql) or die(mysqli_error($link));
		$noOfData = mysqli_num_rows($result);
		
		if($noOfData == 0){
			
			$quiz_seek_sql = "SELECT * FROM quiz WHERE quizNo = '".$quiz_no."'
									AND department = '".$quiz_depertment."' AND year = '".$quiz_year."'
									AND semester = '".$quiz_semester."' AND section = '".$quiz_sec."' AND subject = '".$quiz_subject."'";
			$result = mysqli_query($link,$quiz_seek_sql) or die(mysqli_error($link));
			$noOfData = mysqli_num_rows($result);
			
			if($noOfData > 0){
				
				$quiz_update_sql = "UPDATE quiz 
											SET date = '".$quiz_date."', time = '".$quiz_time."', syllabus =  '".$quiz_syllabus."'
											WHERE quizNo = '".$quiz_no."'
											AND department = '".$quiz_depertment."' AND year = '".$quiz_year."'
											AND semester = '".$quiz_semester."' AND section = '".$quiz_sec."' AND subject = '".$quiz_subject."'";
				$result = mysqli_query($link,$quiz_update_sql) or die(mysqli_error($link));
				
				$msg='
				<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Quiz Updated!</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>' ;
			}
			else{
			$quiz_sql = "INSERT INTO quiz (department, year, semester, section, date, time, subject, quizNo, syllabus)
						VALUES ('".$quiz_depertment."', 
										'".$quiz_year."', 
										'".$quiz_semester."', 
										'".$quiz_sec."',
										'".$quiz_date."',
										'".$quiz_time."',
										'".$quiz_subject."',
										'".$quiz_no."',
										'".$quiz_syllabus."'									
										);";
										
			$result = mysqli_query($link,$quiz_sql) or die(mysqli_error($link));
										
										
			$msg='
				<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong>Submission Successful</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>' ;
						
			mysqli_close($link);
			}
		} else{
			$msg='
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>A Quiz Is Already Set on That Time</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>' ;
		}			
		} else{
			$msg='
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Please Fill Up All The Fields</strong>
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
	<link rel="stylesheet" href="css/admin_quiz.css" />
	

    <title>QUIZ!</title>
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
					<a class="nav-link active" href="admin_quiz.php">QUIZ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="admin_news.php">NEWS</a>
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
					<img src="images/clock2.gif" style="width:100%;">
				</a>
				</div>
			</div>
			<div class="flex-fill form_right">
				<div>
					<p class ="form_msg">Set Up A Quiz</p>
				</div>
				
				<?php echo $msg; ?>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="row">
					<div class="col-lg-12 ">
					<div class="form-group">
					  <label >Choose Department : </label>
					    <select name="quiz_depertment" class="form-control">
						     <option selected>Choose Department</option>
                             <option value="CSE">CSE</option>
                             <option value="EEE">EEE</option>
							 <option value="CIVIL">CIVIL</option>
							 <option value="ARCHITECTURE">ARCHITECTURE</option>
                             <option value="MECHANICAL">MECHANICAL</option>            
                        </select>
					</div>
					</div>
					</div>
					
					<div class="row">
					<div class="col-lg-6 ">
					<div class="form-group">
					  <label >Choose Year : </label>
					    <select name="quiz_year" class="form-control">
						     <option selected>Choose Year</option>
                             <option value="1st">1st</option>
                             <option value="2nd">2nd</option>
							 <option value="3rd">3rd</option>
							 <option value="4th">4th</option>                       
                        </select>
					</div>
					</div>
					
					<div class="col-lg-6 ">
					<div class="form-group">
						<label >Choose Semister : </label>
							<select name="quiz_semester" class="form-control">
								 <option selected>Choose Semester</option>
								 <option value="1st">1st</option>
								 <option value="2nd">2nd</option>								 	 
							</select>
					</div>
					</div>
					</div>
					
					<div class="row">
					<div class="col-lg-12 ">
					<div class="form-group">
						<label >Choose Section : </label>
							<select name="quiz_sec" class="form-control">
								 <option selected>Choose Section</option>
								 <option value="A">A</option>
								 <option value="B">B</option>
								 <option value="C">C</option>								 
							</select>
					</div>
					</div>
					</div>
					
					<div class="row">
					<div class="col-lg-6 ">
					<div class="form-group">
						<label >Choose Date : </label>
						<input type="text" id="quiz_date" name="quiz_date" class="form-control" placeholder="Eg. YYYY-MM-DD" required/>
					</div>
					</div>
					
					<div class="col-lg-6 ">
					<div class="form-group">
						<label >Choose Time : </label>
						<input type="text" id="quiz_time" name="quiz_time" class="form-control" placeholder="Eg. HH:MM:SS" required/>
					</div>
					</div>
					</div>
					
					<div class="row">
					<div class="col-lg-6 ">
					<div class="form-group">
						<label >Enter Subject : </label>
						<input type="text" id="quiz_subject" name="quiz_subject" class="form-control" placeholder="Eg. CSE 1104" required/>
					</div>
					</div>
					
					<div class="col-lg-6 ">
					<div class="form-group">
						<label >Enter Quiz No : </label>
						<input type="text" id="quiz_no" name="quiz_no" class="form-control" placeholder="Eg. 1" required/>
					</div>
					</div>
					</div>
					
					
					<div class="form-group">
						<label>Comments/Syllabus : </label>
						<textarea type="text" class="form-control" id="quiz_syllabus" placeholder="Enter Comments/Syllabus" name="quiz_syllabus" required></textarea>					
					</div>
					
		
					<div class="row">
					<div class="col-lg-12 ">
						<button type="submit" name = "quiz_submit" value = "submit" class="btn btn-success">Confirm Quiz</button>
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
	$('#quiz_date').datepicker({
		format: 'yyyy-mm-dd',
		uiLibrary: 'bootstrap4'
		
	});
	
</script>

<script>
	$('#quiz_time').timepicker({
		format: 'HH:MM:ss',
		uiLibrary: 'bootstrap4'
	});
</script>
</body>
</html>