<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/login.css" />
	
	<!-- icon er jnno -->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	
	
    <title>QUIZ!</title>
</head>
<body>
<!--code starts from here-->
  <!-- navbar -->
	<div class="home_block1">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
			<!-- Brand/logo -->
			<a class="navbar-brand" href="#">
				<img src="images/aust_logo.png" alt="Logo" style="width:40px;">
			</a>
	  
			<!-- Links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" href="home.php">HOME</a>
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
				<li class="nav-item">
					<a class="nav-link disabled" href="#">ADMIN PANEL</a>
				</li>
			</ul>
			
			<ul class="navbar-nav ml-auto">
				<a class="navbar-brand" href="login.php">
				<img src="images/account_icon.png" alt="Logo" style="width:40px;">
			</a>
			</ul>
		</nav>
	</div>
	<div class="login_bg">
  <div class="title"><h1>Sign In Form</h1></div>
  <div class="d-flex">
     <div class="flex-fill left">
		<div class="prompt">
			<p>Don't Have An Account?</p>
		</div>
		<div class="reg">
			 <a href="registration.php">
				<button type="button" class="btn btn-outline-primary">Sign Up!</button>
			 <a/>
		</div>
	 </div>
     <div class="right">
	     <div class="formBox">
		    <form>
                    <p>Username</p>
                    <input type="text" name=""	placeholder="Admin" required>	
                    <p>Password</p>
                    <input type="password" name=""	placeholder="•••••" required>	
                    <input type="submit" name="" value="Sign in" >
					<a href="#">Forgot password?</a>
				</form>	
	    </div>
	 </div>
	 </div>
	 </div>



	
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>