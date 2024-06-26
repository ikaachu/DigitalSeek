<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $Collection = isset($_POST['Collection']) ? $_POST['Collection'] : '';
   $Record_Format = $_POST['Record_Format'];
   $Title = $_POST['Title'];
   $Creator = $_POST['Creator'];
   $Description = $_POST['Description'];
   $Type = $_POST['Type'];
   $Date = $_POST['Date'];

   $sql = "INSERT INTO crud (`id`, `Collection`, `Record_Format`, `Title`, `Creator`, `Description`, `Type`, `Date`) 
   VALUES (NULL,'$Collection','$Record_Format','$Title','$Creator', '$Description','$Type', '$Date')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: manage.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!-- dashboard -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
  integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Create Inventory</title>
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
	padding-left: 80px;
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

<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">DIGITAL <b>SEEK</b>
			<label for="checkbox">
				<i id="nav btn" class="fa fa-bars" aria-hidden="true"></i>
			</label>

            </h2>
		<i class="fa fa-user" aria-hidden="true"></i>
	</header>

    <div class="body">
		<nav class="side-bar">
        <div class="user-p">
				<img src="img/profile.png">
				<h4>Admin</h4>
			</div>
            <ul>
				<li>
					<a href="index.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Dashboard</span>
					</a>
				</li>
				
				<li>
					<a href="#">
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
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <br>
	
	<body style="background-color: #01294A;" >
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #F3F3F3;">
  Representation Details
  </nav>

  <div class="container" >
      <div class="text-center mb-4" style="color:white;">
         <h3>Add New Information</h3>
         <p class="text-muted">Complete the form below to add a new details</p>
      </div>

      <div class="container d-flex justify-content-center" style="background-color: #F3F3F3;">
         <form action="" method="post" style="width:50vw; min-width:300px;">                     
           <br>
            <div class="form-group mb-3" >
            <div class="mb-3" >
            


            
            
               <label>Collection:</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="Collection" id="Existing" value="Existing">
               <label for="Existing" class="form-input-label">Existing</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="Collection" id="New" value="New">
               <label for="New" class="form-input-label">New</label>
            </div>

            <div class="row mb-3"> 
            
            <div class="mb-3" >
              <label class="form-label">Record Format:</label>
                  <select class="form-select" name="Record_Format">
                    <option value="" selected disabled>Look-up or select</option>
                    <option value="MARC21 Bibliography">MARC21 Bibliography</option>
                    <option value="Dublin Core">Dublin Core</option>
                  </select>
               </div>

            <div class="mb-3" >
               <label class="form-label">Title:</label>
               <input type="Title" class="form-control" name="Title" placeholder="Title">
            </div>

            <div class="mb-3" >
               <label class="form-label">Creator:</label>
               <input type="text" class="form-control" name="Creator" placeholder="Creator">
            </div>

            <div class="mb-3" >
               <label class="form-label">Description:</label>
               <input type="text" class="form-control" name="Description" placeholder="Description">
            </div>

           
<div class="col">
   <label class="form-label">Type:</label>
   <select class="form-select" name="Type">
      <option value="" selected disabled>Choose a Type</option>
      <option value="Book">Book</option>
      <option value="Computer file">Computer file</option>
      <option value="Journal">Journal</option>
      <option value="Map">Map</option>
      <option value="Music">Music</option>
      <option value="Mixed material">Mixed material</option>
      <option value="Visual material">Visual material</option>
   </select>
</div>           

               <div class="col"  >
                  <label class="form-label">Date:</label>
                  <input type="Date" class="form-control" name="Date">
               </div>
            </div>

            <div>
            <div class="d-flex justify-content-end mt-3" >
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="manage.php" class="btn btn-danger">Cancel</a>

               
            </div>
            <br>
         </form>
      </div>
   </div>
  <br>
  <br>
  

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
   integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

	
    

  

</body>

</html>