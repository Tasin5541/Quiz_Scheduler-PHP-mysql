<?php
include 'home_code.php';
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
	<link rel="stylesheet" href="css/home.css" />
	

    <title>HOME!</title>
</head>
<body>
<!--code starts from here-->
<div class="home_bg">
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
	
	<div class="home_block2">
		<?php echo $lmsg; ?>
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
					<img src="images/carousel_5.jpg" alt="New York" >
					<div class="carousel-caption">
						<h3>MERSMERIZING VIEW</h3>
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
	
	<div class="m_body white_bg">
		<div class="container">
			<div class="row">
				<h1 class="home_h1">AHSANULLAH UNIVERSITY!</h1>
			</div>
			<div class="row">
				<h4 class="home_h4">Manner! Respect! Loyalty!</h4>
			</div>
			
			<div class="row">
				<p class= "margin_top p_font_size">Welcome to the AUST Website.</p>
				<br>
				<p class= "p_font_size">Sponsored by the Dhaka Ahsania Mission and approved by the Government of the
				People's  Republic of Bangladesh, Ahsanullah University of Science and Technology 
				has been successfully carrying out its  noble mission since 1995.</p>
				<br>
				<p class= "p_font_size">It maintains close collaboration with the University Grants Commission (UGC), 
				Bangladesh and many other national and  international educational institutions 
				and professional bodies.</p>
			</div>
		</div>
	</div>
			
		<div class="container">
			<div class="row margin_top">
				<div class="col-md-4 center_align">
					<img src="images/light3.png" style= "width: 230px;">
					<p class="p_bold" style="margin-top:30px;">ENLIGHTENED</p>
				</div>
				
				<div class="col-md-4 center_align">
					<img src="images/graduate.png" style= "width: 230px;">
					<p class="p_bold" style="margin-top:30px;">CONVOCATION</p>
				</div>
					
				<div class="col-md-4 center_align">
					<img src="images/bar.png" style= "width: 230px;">
					<p class="p_bold" style="margin-top:30px;">RIVALRY</p>
				</div>
			</div>
		</div>

	
	<div class= "home_news container-fluid gray_bg margin_top">
		<div class="container">
		<div class="row ">
		<p style="font-weight:bold; font-size: 40px;">Have A Peek!!</p>
		</div>
		<?php for($i=0;$i<$noOfData;$i++){?>
			<div class="row">
				<div class="col-md-3 padding_0 col_margin">
					<div class="card height_100" >
						<div class="card-body ylw_bg ">
							<p style="color: #a82a3d; font-weight:bold; font-size: 25px; margin-bottom: 0px;"><?php echo $date[$i]?></p>
							<br>
							<p class="white" style=" font-weight:bold; font-size: 25px;"><?php echo $topic[$i]?></p>
						</div>
					</div>
				</div>
				<div class="col-md-9 padding_0 col_margin">
					<div class="card height_100" >
						<div class="card-body">
							<p style="font-size: 20px;"><?php echo $brief[$i]?></p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
	
	<div class="home_end">
		<p class="home_p">© 2018 AUST CSE 3.1,All Rights Reserved</p>
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