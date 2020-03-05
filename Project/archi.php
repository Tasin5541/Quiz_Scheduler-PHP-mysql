<?php
include 'dep_code.php';
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
	<link rel="stylesheet" href="css/archi.css" />

    <title>ARCHITECTURE!</title>
</head>
<body>
<!--code starts from here-->
<div class="main">
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
					<a class="nav-link dropdown-toggle active" href="#" data-toggle="dropdown">SCHEDULE</a>
					<div class="dropdown-content">
						<a class="dropdown-item" href="cse.php">CSE</a>
						<a class="dropdown-item" href="eee.php">EEE</a>
						<a class="dropdown-item" href="civil.php">CIVIL</a>
						<a class="dropdown-item" href="archi.php">ARCHITECTURE</a>
						<a class="dropdown-item" href="mecha.php">MECHANICAL</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">CONTACT</a>
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
      <input type="text" id="email" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" id="password" placeholder="Enter Password" name="password" required>
        
      <button class="login_btn" type="submit">Login</button>
    </div>

    <div class="container-fluid" style="background-color:#f1f1f1">
		<div class="container" >
		  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		  <span class="psw">Don't Have An Account? <a href="registration.php">sign up</a></span>
		</div>
	</div>
  </form>
</div>
	
	<!--login message-->
	<?php echo $msg; ?>
	
	<?php
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		?>
	<!--tabs-->
	<div class="container-fluid">
	  <h1>ARCHITECTURE Department</h1>
	  <?php echo $lmsg; ?>
	  <br>
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
		  <a class="nav-link active" data-toggle="tab" style="font-weight:bold;" href="#home">1st Year</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="tab" style="font-weight:bold;" href="#menu1">2nd Year</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="tab" style="font-weight:bold;" href="#menu2">3rd Year</a>
		</li>
		<li class="nav-item">
		  <a class="nav-link" data-toggle="tab" style="font-weight:bold;" href="#menu3">4th Year</a>
		</li>
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content">
	  
	  <!--1st year-->
		<div id="home" class="container-fluid tab-pane active"  data-offset="70"><br>
		  <h3>1st Year</h3>
		  <!--semester choose-->
		  <div class="dropdown">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			  Choose Semester
			</button>
			<div class="dropdown-menu">
			  <a class="dropdown-item" href="#11">1st Semester</a>
			  <a class="dropdown-item" href="#12">2nd Semester</a>
			</div>
		  </div>
		  
		  <!--1-1-->
		  <div id="11">
		  <div style="padding-top: 70px;">
			  <h1>1st Semester</h1>
			  </div>
		    <!--A sec-->
		    <div class="container">
			  <h2>A Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse1_1 A-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '1st' AND 
									semester = '1st' AND section = 'A' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--B sec-->
			<div class="container">
			  <h2>B Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse1_1 B-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '1st' AND 
									semester = '1st' AND section = 'B' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				
				</tbody>
			  </table>
			</div>
			
			<!--c sec-->
			<div class="container">
			  <h2>C Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse1_1 C-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '1st' AND 
									semester = '1st' AND section = 'C' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				
				</tbody>
			  </table>
			</div>
		  </div>
		  
		  <!--1-2-->
		  <div id="12">
		  <div style="padding-top: 70px;">
			<h1>2nd Semester</h1>
			</div>
		  <!--A sec-->
		    <div class="container">
			  <h2>A Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse1_2 A-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '1st' AND 
									semester = '2nd' AND section = 'A' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				
				</tbody>
			  </table>
			</div>
			
			<!--B sec-->
			<div class="container">
			  <h2>B Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse1_2 B-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '1st' AND 
									semester = '2nd' AND section = 'B' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				
				</tbody>
			  </table>
			</div>
			
			<!--c sec-->
			<div class="container">
			  <h2>C Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse1_2 C-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '1st' AND 
									semester = '2nd' AND section = 'C' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				
				</tbody>
			  </table>
			</div>
		  </div>
		</div>
		
		<!--2nd year-->
		<div id="menu1" class="container-fluid tab-pane fade"><br>
		  <h3>2nd Year</h3>
		  <div class="dropdown">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			  Choose Semester
			</button>
			<div class="dropdown-menu">
			  <a class="dropdown-item" href="#2-1">1st Semester</a>
			  <a class="dropdown-item" href="#2-2">2nd Semester</a>
			</div>
		  </div>
		  
		  <!--2-1-->
		  <div id="2-1">
		  <div style="padding-top: 70px;">
			  <h1>1st Semester</h1>
			  </div>
			  
			<!--A sec--> 
		    <div class="container">
			  <h2>A Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse2_1 A-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '2nd' AND 
									semester = '1st' AND section = 'A' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--B sec-->
			<div class="container">
			  <h2>B Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse2_1 B-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '2nd' AND 
									semester = '1st' AND section = 'B' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--C sec-->
			<div class="container">
			  <h2>C Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse2_1 C-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '2nd' AND 
									semester = '1st' AND section = 'C' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
		  </div>
		  
		  <!--2-2-->
		  <div id="2-2">
		  <div style="padding-top: 70px;">
			  <h1>2nd Semester</h1>
			  </div>
		  
		  <!--A sec-->
		    <div class="container">
			  <h2>A Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse2_2 A-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '2nd' AND 
									semester = '2nd' AND section = 'A' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--B sec-->
			<div class="container">
			  <h2>B Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse2_2 B-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '2nd' AND 
									semester = '2nd' AND section = 'B' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--C sec-->
			<div class="container">
			  <h2>C Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse2_2 C-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '2nd' AND 
									semester = '2nd' AND section = 'C' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
		  </div>
		</div>
		
		<!--3rd year-->
		<div id="menu2" class="container-fluid tab-pane fade"><br>
		  <h3>3rd Year</h3>
		  <div class="dropdown">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			  Choose Semester
			</button>
			<div class="dropdown-menu">
			  <a class="dropdown-item" href="#3-1">1st Semester</a>
			  <a class="dropdown-item" href="#3-2">2nd Semester</a>
			</div>
		  </div>
		  
		  <!--3-1-->
		  <div id="3-1">
		  <div style="padding-top: 70px;">
			  <h1>1st Semester</h1>
			  </div>
			  
			<!--A sec--> 
		    <div class="container">
			  <h2>A Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse3_1 A-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '3rd' AND 
									semester = '1st' AND section = 'A' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--B sec-->
			<div class="container">
			  <h2>B Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse3_1 B-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '3rd' AND 
									semester = '1st' AND section = 'B' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--C sec-->
			<div class="container">
			  <h2>C Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse3_1 C-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '3rd' AND 
									semester = '1st' AND section = 'C' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
		  </div>
		  
		  <!--3-2-->
		  <div id="3-2">
		  <div style="padding-top: 70px;">
			  <h1>2nd Semester</h1>
			  </div>
		  
		  <!--A sec-->
		    <div class="container">
			  <h2>A Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse3_2 A-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '3rd' AND 
									semester = '2nd' AND section = 'A' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--B sec-->
			<div class="container">
			  <h2>B Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse3_2 B-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '3rd' AND 
									semester = '2nd' AND section = 'B' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--C sec-->
			<div class="container">
			  <h2>C Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse3_2 C-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '3rd' AND 
									semester = '2nd' AND section = 'C' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
		  </div>
		</div>
		
		<!--4th year-->
		<div id="menu3" class="container-fluid tab-pane fade"><br>
		  <h3>4th Year</h3>
		  <div class="dropdown">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			  Choose Semester
			</button>
			<div class="dropdown-menu">
			  <a class="dropdown-item" href="#4-1">1st Semester</a>
			  <a class="dropdown-item" href="#4-2">2nd Semester</a>
			</div>
		  </div>
		  
		  <!--4-1-->
		  <div id="4-1">
		  <div style="padding-top: 70px;">
			  <h1>1st Semester</h1>
			  </div>
			  
			<!--A sec--> 
		    <div class="container">
			  <h2>A Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse4_1 A-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '4th' AND 
									semester = '1st' AND section = 'A' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--B sec-->
			<div class="container">
			  <h2>B Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse4_1 B-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '4th' AND 
									semester = '1st' AND section = 'B' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--C sec-->
			<div class="container">
			  <h2>C Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse4_1 C-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '4th' AND 
									semester = '1st' AND section = 'C' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
		  </div>
		  
		  <!--4-2-->
		  <div id="4-2">
		  <div style="padding-top: 70px;">
			  <h1>2nd Semester</h1>
			  </div>
		  
		  <!--A sec-->
		    <div class="container">
			  <h2>A Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse4_2 A-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '4th' AND 
									semester = '2nd' AND section = 'A' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--B sec-->
			<div class="container">
			  <h2>B Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse4_2 B-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '4th' AND 
									semester = '2nd' AND section = 'B' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
			
			<!--C sec-->
			<div class="container">
			  <h2>C Section</h2>
			  <p>The dates and times may change:</p>            
			  <table class="table table-striped">
				<thead>
				  <tr>
					<th>Date</th>
					<th>Time</th>
					<th>Subject</th>
					<th>Quiz No</th>
					<th>Syllabus</th>
				  </tr>
				</thead>
				<tbody>
				
				<!--cse4_2 C-->
				<?php
				$date=array();
				$time=array();
				$subject=array();
				$quizNo=array();
				$syllabus=array();
				
				$cse_sql = "SELECT * FROM quiz WHERE department = 'ARCHITECTURE' AND year = '4th' AND 
									semester = '2nd' AND section = 'C' AND
								   date >= CURDATE() 
								   ORDER BY date";
								   
				$result = mysqli_query($link,$cse_sql) or die(mysqli_error($link));
				
				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$date[]=$row[5];
					$time[]=$row[6];
					$subject[]=$row[7];
					$quizNo[]=$row[8];
					$syllabus[]=$row[9];
				}
				?>
				
				
				<?php for($i=0;$i<$noOfData;$i++){ ?>
				  <tr>
					<td><?php echo $date[$i]?></td>
					<td><?php echo $time[$i]?></td>
					<td><?php echo $subject[$i]?></td>
					<td><?php echo $quizNo[$i]?></td>
					<td><?php echo $syllabus[$i]?></td>
				  </tr>
				<?php } ?>
				  
				</tbody>
			  </table>
			</div>
		  </div>
		</div>
	  </div>
	</div>
</div>
	<?php } ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login.js"></script>
</body>
</html>