<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/home.css" />
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
			<a class="navbar-brand" href="home.html">
				<img src="images/aust_logo.png" alt="Logo" style="width:40px;">
			</a>
	  
			<!-- Links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" href="home.html">HOME</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">SCHEDULE</a>
					<div class="dropdown-content">
						<a class="dropdown-item" href="cse.html">CSE</a>
						<a class="dropdown-item" href="eee.html">EEE</a>
						<a class="dropdown-item" href="civil.html">CIVIL</a>
						<a class="dropdown-item" href="archi.html">ARCHITECTURE</a>
						<a class="dropdown-item" href="mecha.html">MECHANICAL</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.html">CONTACT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">ADMIN PANEL</a>
				</li>
			</ul>
			
			<ul class="navbar-nav ml-auto">
			<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="navbar-brand">
				<img src="images/account_icon.png" alt="Logo" style="width:40px;">
			</button>
			</ul>
		</nav>
	</div>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/account_icon.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>


<div class="home_block2">
	<!-- carousel -->
		<div id="demo" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			</ul>
	  
			<!-- The slideshow -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="images/carousel_2.jpg" alt="Los Angeles">
					<div class="carousel-caption">
						<h3>MAIN CAMPUS</h3>
						<p>Eplore the green!</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="images/carousel_3.jpg" alt="Chicago">
					<div class="carousel-caption">
						<h3>FRIENDSHIP</h3>
						<p>Strengthen you bond!</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="images/carousel_4.jpg" alt="New York" >
					<div class="carousel-caption">
						<h3>RESEARCH LAB</h3>
						<p>Eplore the unknown!</p>
					</div>
				</div>
			</div>
	  
			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</div>
	
	<div class="body">
		<div class="container">
			<div class="row">
				<h1 class="home_h1">AHSANULLAH UNIVERSITY!</h1>
			</div>
			<div class="row">
				<h4 class="home_h4">Manner! Respect! Loyalty!</h4>
			</div>
			
			<div class="row">
				<div class="col-md-3">
					<div class="card" >
						<img class="card-img-top" src="images/avatar1.png" alt="Card image" style="width:100%">
						<div class="card-body">
							<h4 class="card-title">John Doe</h4>
							<p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
							<a href="#" class="btn btn-primary">See Profile</a>
						</div>
					</div>
				</div>
			
				<div class="col-md-3">
					<div class="card" >
						<img class="card-img-top" src="images/avatar1.png" alt="Card image" style="width:100%">
						<div class="card-body">
							<h4 class="card-title">Anwarul Kabir</h4>
							<p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
							<a href="#" class="btn btn-primary">See Profile</a>
						</div>
					</div>
				</div>
			
				<div class="col-md-3">
					<div class="card" >
						<img class="card-img-top" src="images/avatar2.png" alt="Card image" style="width:100%">
						<div class="card-body">
							<h4 class="card-title">Arissa Kabir</h4>
							<p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
							<a href="#" class="btn btn-primary">See Profile</a>
						</div>
					</div>
				</div>
			
				<div class="col-md-3">
					<div class="card" >
						<img class="card-img-top" src="images/avatar1.png" alt="Card image" style="width:100%">
						<div class="card-body">
							<h4 class="card-title">John Doe</h4>
							<p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
							<a href="#" class="btn btn-primary">See Profile</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="home_end">
		<p class="home_p">© 2018 AUST CSE 3.1,All Rights Reserved</p>
	</div>	
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/main.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>