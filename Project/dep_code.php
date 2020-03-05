<?php
session_start();

$msg='';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} 
else {
    $msg='
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong> Please Log In To View This Page</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>' ;
				
	//header( "refresh:3;url=home.php" );
}
?>

<?php

$name='';
$lmsg='';
$success= 0;
$admin_panel='';

if(!empty($_POST))   //submit na kora prjnto etar kaj hbe na
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
		
		$msg='
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
		$msg='
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
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		
		$date=array();
		$time=array();
		$subject=array();
		$quizNo=array();
		$syllabus=array();
		
		$host = 'localhost';   //always same thakbe
		$user = 'root';        //server create korar shomoi username set kora jai.eta db access korar jnno
		$password ='';
		$db='project';

		$link = mysqli_connect($host,$user,$password,$db);
	}
?>