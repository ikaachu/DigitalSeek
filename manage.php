<?php
include "db_conn.php";
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

  <title>Manage Inventory</title>
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
		<h2 class="u-name">SIDE <b>BAR</b>
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
					<a href="create.php">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>Create Inventory</span>
					</a>
				</li>
				<li>
					<a href="#">
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
  Top Level Collections
  </nav>
	
    <a href="create.php" class="btn btn-success mb-3">Add New</a>

    <!-- Search Bar -->
		<!-- Search Bar -->
<form action="manage.php" method="GET" class="mb-3">
    <div class="input-group mb-3">
        <input type="text" class="form-control" value="<?php if (isset($_GET['search'])) 
		{ echo $_GET['search']; } ?>" name="search" placeholder="search">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
   
    </form>

    <table class="table table-hover text-center" style="background-color: #FFE28A;">
      <thead style="background-color: #FDD93B; color: black;"   >
        <tr>
          
          <th scope="col">ID</th>	
          <th scope="col">Collection</th>
          <th scope="col">Record Format</th>
          <th scope="col">Title</th>
          <th scope="col">Creator</th> 
		  <th scope="col">Description</th>   
          <th scope="col">Type</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
        <?php


if (isset($_GET['search'])) {
    $conn = mysqli_connect("localhost", "root", "", "test_db");
    $filtervalue = $_GET['search'];
    $filterdata = "SELECT * FROM crud WHERE CONCAT(id, Collection, Record_Format, Title, Creator, Description, Type, Date) LIKE '%$filtervalue%'";
    $filterdata_run = mysqli_query($conn, $filterdata);

    if (mysqli_num_rows($filterdata_run) > 0) {
        foreach ($filterdata_run as $row) {
            ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["Collection"] ?></td>
                <td><?php echo $row["Record_Format"] ?></td>
                <td><?php echo $row["Title"] ?></td>
                <td><?php echo $row["Creator"] ?></td>
                <td><?php echo $row["Description"] ?></td>
                <td><?php echo $row["Type"] ?></td>
                <td><?php echo $row["Date"] ?></td>
            </tr>
            <?php
        }

    } else {
        ?>
        <tr>
            <td colspan="7">No records found</td>
        </tr>
        <?php
    }
}




        $sql = "SELECT * FROM `crud`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>		
            <td><?php echo $row["Collection"] ?></td>
            <td><?php echo $row["Record_Format"] ?></td>
            <td><?php echo $row["Title"] ?></td>
            <td><?php echo $row["Creator"] ?></td>
			<td><?php echo $row["Description"]?></td>
            <td><?php echo $row["Type"] ?></td>
            <td><?php echo $row["Date"] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark">
              <i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>

              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark">
              <i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>