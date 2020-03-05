<?php

$admin_panel='';		
$email_flag = 0;

if(empty($_POST)){
		$msg='';
}
	
if(!empty($_POST))   //submit na kora prjnto etar kaj hbe na
{
	$first_name = $_POST['reg_f_name'];
	$last_name = $_POST['reg_l_name'];
	$email = $_POST['reg_email'];
	$pass = $_POST['reg_pass'];
	$repass = $_POST['reg_re_pass'];
	$id = $_POST['reg_id'];
	$department = $_POST['reg_depertment'];
	$year = $_POST['reg_year'];
	$semester = $_POST['reg_semester'];
	
	if($department !== "Choose Department" && $year !== "Choose Year" && $semester !== "Choose Semester"){
		if($pass === $repass){
			$host = 'localhost';   //always same thakbe
			$user = 'root';        //server create korar shomoi username set kora jai.eta db access korar jnno
			$password ='';
			$db='project';
			
			$link = mysqli_connect($host,$user,$password,$db);
			
			$email_sql = 'SELECT email FROM user WHERE email = "'.$email.'"';
			$result = mysqli_query($link,$email_sql) or die(mysqli_error($link));
			
			$noOfData = mysqli_num_rows($result);
			while($row = mysqli_fetch_row($result)){
				
			if($row[0] === $email)
			{
				$email_flag = 1;
			}
			}
			
			if($email_flag == 1){
				$msg='
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Email Is Already Used</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>' ;
			}else{
			
			$host = 'localhost';   //always same thakbe
			$user = 'root';        //server create korar shomoi username set kora jai.eta db access korar jnno
			$password ='';
			$db='project';
			
			$link = mysqli_connect($host,$user,$password,$db);
			
			$final_pass = md5($pass);
			
			$sql = "INSERT INTO user (first_name, last_name, email, password, u_id, depertment, year, semester)
					VALUES ('".$first_name."', 
									'".$last_name."', 
									'".$email."', 
									'".$final_pass."',
									'".$id."',
									'".$department."',
									'".$year."',
									'".$semester."'									
									);";
			$result = mysqli_query($link,$sql) or die(mysqli_error($link));
			
			$msg='
			<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Successfully Registered, Redirecting To Home Page</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>' ;
					
			header("refresh:1; url=home.php");
					
			}
			

			//die;   //erpr r code run hbe na
		}
		
		else {
			$msg='
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Passwords Do Not Match</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>' ;
					
		}
	}else{
		
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
	<link rel="stylesheet" href="css/registration.css" />	
    <link rel="stylesheet" href="css/main.css" />
	
	<!-- icon er jnno -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	
	
    <title>Registration</title>
</head>
<body>
<!--code starts from here-->

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
					<a class="nav-link" href="contact.php">CONTACT</a>
				</li>
				<?php echo $admin_panel?>
				
			</ul>
			
		</nav>
	</div>
	

	
<div class="container">
   <div class="row">
		
   <div class="col-lg-3 "></div>
    <div class="col-lg-6 ">
	     <div id="ui">
	        <form action="" method="POST" enctype="multipart/form-data" class="form-container">
         
              <div class="form-group">
			          <h1>Registration Form</h1>
					  <?php echo $msg; ?>
			        <div class="row">
				      <div class="col-lg-6 ">
				         <label >First Name</label>
						 <input type="text" id="reg_f_name" name="reg_f_name" class="form-control"  placeholder="First Name" required>
						 
					   </div>	 
					   <div class="col-lg-6 ">
				         <label >Last Name</label>
						 <input type="text" id="reg_l_name" name="reg_l_name" class="form-control" placeholder="Last Name" required >
						 
					   </div>
				    </div> 
					<br>
				    <div class="row">   
			            <div class="col-lg-12 ">
                             <label >Email</label>
                             <input type="email" id="reg_email" name="reg_email" class="form-control"  placeholder="Email" required>
                         </div>
					</div>
					</br>
					
					<div class="row">
				      <div class="col-lg-6 ">
				         <label >Password</label>
						 <input type="Password" id="reg_pass" name="reg_pass" class="form-control"  placeholder="Password" required>
						 
					   </div>	 
					   <div class="col-lg-6 ">
				         <label >Re-type Password</label>
						 <input type="Password" id="reg_re_pass" name="reg_re_pass" class="form-control" placeholder="Re-type Password" required >
						 
					   </div>
					 
				    </div> 
					<br>
					 <div class="row"> 
				  	  <div class="col-lg-6 ">
					    
					    <label >ID</label>
						 <input type="text" id="reg_id" name="reg_id" class="form-control" placeholder="##-##-##-###"  required>
                          
					   </div>
					
					   <div class="col-lg-6 ">
					    <label >Choose Department : </label>
					    <select name="reg_depertment" class="form-control">
						     <option selected>Choose Department</option>
                             <option value="CSE">CSE</option>
                             <option value="EEE">EEE</option>
							 <option value="CIVIL">CIVIL</option>
							 <option value="ARCHITECTURE">ARCHITECTURE</option>
                             <option value="MECHANICAL">MECHANICAL</option>
                             
                             
                        </select>
						</div>
						</div>
                       </br>
					   <div class="row"> 
					   <div class="col-lg-6 ">
					  
					    <label >Choose Year : </label>
					    <select name="reg_year" class="form-control">
						     <option selected>Choose Year</option>
                             <option value="1st">1st</option>
                             <option value="2nd">2nd</option>
							 <option value="3rd">3rd</option>
							 <option value="4th">4th</option>
                             
                             
                        </select>
						</div>
                      
					   
					    
					   <div class="col-lg-6 ">
					 
					    <label >Choose Semister : </label>
					    <select name="reg_semester" class="form-control">
						     <option selected>Choose Semester</option>
                             <option value="1st">1st</option>
                             <option value="2nd">2nd</option>
                             
                             
                        </select>
						 </div>
                      
                       </div>
					   <br>
               <button type="submit" class="btn btn-success btn-block">Submit</button>
			   </br>
         </form>
	    
	    </div>
	 
	</div>
	<div class="col-lg-3 "></div>
    
    
     </div>
	 </div>
	
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>