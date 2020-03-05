<?php
session_start();

$name='';
$lmsg='';
$success= 0;
$admin_panel='';

//news

$date=array();
$topic=array();
$brief=array();

$host = 'localhost';   //always same thakbe
$user = 'root';        //server create korar shomoi username set kora jai.eta db access korar jnno
$password ='';
$db='project';

$link = mysqli_connect($host,$user,$password,$db);

$news_sql = 'SELECT * FROM news ORDER BY id DESC';
$news_result = mysqli_query($link,$news_sql) or die(mysqli_error($link));

$noOfData = mysqli_num_rows($news_result);
while($news_row = mysqli_fetch_row($news_result)){
	$date[]=$news_row[1];
	$topic[]=$news_row[2];
	$brief[]=$news_row[3];
}

mysqli_close($link);

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
}

if(isset($_SESSION['admin'])){
	$admin_panel='<li class="nav-item">
					<a class="nav-link" href="admin_message.php">ADMIN PANEL</a>
				</li>';
}
?>