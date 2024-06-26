<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<style>
	/*Home Page*/
* {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: arial, sans-serif;
}
.header {
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 15px 30px;
	background: #F3F3F3;
	color: #080808 ;
}
.u-name {
	font-size: 20px;
	padding-left: 17px;
}
.u-name b {
	color: #127b8e;
}
.header i {
	font-size: 30px;
	cursor: pointer;
	color: #fff;
}
.header i:hover {
	color: #127b8e;
}
.user-p {
	text-align: center;
	padding-left: 10px;
	padding-top: 25px;
}
.user-p img {
	width: 100px;
	border-radius: 50%;
}
.user-p h4 {
	color: #1E1E1E;
	padding: 5px 0;

}
.side-bar {
	width: 250px;
	background: #F3F3F3;
	min-height: 100vh;
	transition: 500ms width;
}
.body {
	display: flex;
}
.section-1 {
	width: 100%;
	background-color: #01294A;
	background-size: cover;
	background-position: center;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}
.section-1 h1 {
	color: #fff;
	font-size: 25px;
    padding-bottom: 450px;
	padding-right: 700px;
  
}


 .welcome-text {
    color: white;
	text-align: center;
    font-size: 30px; /* Adjust the font size as needed */
	padding: 300px;

}

form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
  }

  form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
  }
  
  form.example button:hover {
    background: #0b7dda;
  }
  
  form.example::after {
    content: "";
    clear: both;
    display: table;
  }

  

.side-bar ul {
	margin-top: 20px;
	list-style: none;
}
.side-bar ul li {
	font-size: 16px;
	padding: 15px 0px;
	padding-left: 20px;
	transition: 500ms background;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.side-bar ul li:hover {
	background: #127b8e;
}
.side-bar ul li a {
	text-decoration: none;
	color: #1E1E1E;
	cursor: pointer;
	letter-spacing: 1px;
}
.side-bar ul li a i {
	display: inline-block;
	padding-right: 10px;
	font-size: 23px;
}
#nav btn {
	display: inline-block;
	margin-left: 70px;
	font-size: 20px;
	transition: 500ms color;
}
#checkbox {
	display: none;
}
#checkbox:checked ~ .body .side-bar {
	width: 60px;
}
#checkbox:checked ~ .body .side-bar .user-p{
	visibility: hidden;
}
#checkbox:checked ~ .body .side-bar a span{
	display: none;
}
</style>

<body >
<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">DIGITAL <b>SEEK</b>
			<label for="checkbox">
				<i id="nav btn" class="fa fa-bars" aria-hidden="true"></i>
			</label>

            </h2>
		<i class="fa fa-user" aria-hidden="true"></i>
	</header>

    <div class="body" style="background-color: #01294A;" >
		<nav class="side-bar">
        <div class="user-p">
				<img src="img/profile.png">
				<h4>Admin</h4>
			</div>
            <ul>
				<li>
					<a href="#">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Dashboard</span>
					</a>
				</li>
				
				<li>
					<a href="create.php">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>Create Inventory</span>
					</a>
				</li>
				<li>
					<a href="manage.php">
						<i class="fa fa-info-circle" aria-hidden="true"></i>
						<span>Manage Inventory</span>
					</a>
				</li>
				<li>
					<a href="upload.php">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>Upload</span>
					</a>
				</li>
				<li>
					<a href="welcome.php">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>

		<div class="container" 	style="background-color:#01294A;">
		
				<h1 class="welcome-text">		
					Welcome, <?php echo $_SESSION['username']; ?>      
						<?php echo "" . date("d/m/y") . "<br>";?>
					</h1>

				
	
		<section>	     
		            

      
       
		</section>
     

	</div>


</body>
</html>


<?php

?>

</body>
</html>