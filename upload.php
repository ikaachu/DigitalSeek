<?php
      if(isset($_POST['btn_img']))
      {
        $con = mysqli_connect("localhost","root","","test_db");

        $filename = $_FILES["choosefile"]["name"];
        $tempfile = $_FILES["choosefile"]["tmp_name"];
        $folder = "image/".$filename;
        $sql = "INSERT INTO `images`(`image`)VALUES('$filename')";
        if($filename == "")
        {
            echo 
            "
            <div class='alert alert-danger' role='alert'>
                <h4 class='text-center'>Blank not Allowed</h4>
            </div>
            ";
        }else{
            $result = mysqli_query($con, $sql);
            move_uploaded_file($tempfile, $folder);
            echo 
            "
            <div class='alert alert-success' role='alert'>
                <h4 class='text-center'>Image uploaded</h4>
            </div>
            ";
        }
      }

        
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">

    <title>Upload File</title>

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

.section-1 form {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Align items to the start (left) */
}

.section-1 form .row {
    width: 100%;
}
.section-1 form .col-6 {
    width: 500%;
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


</head>

<body>
<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">SIDE <b>BAR</b>
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
		<br>
		<br>
				

				<body style="background-color: #01294A;" >
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #F3F3F3;">
  Upload your documents
  </nav>

   <!-- Search Bar -->
   <form action="upload.php" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search..." name="search">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
  
  <div class="alert alert-secondary" role="alert">
       	   </div>	

		<section class="section-1"> 
          
         <form action="upload.php" method="post" class="form-control" enctype="multipart/form-data">
            <input type="file" class="form-control" name="choosefile"  id="">
            <div class="col-6 m-auto">
                <button type="submit" name="btn_img" class="btn btn-outline-success m-4">
                Submit
            </button>
            </div>
        </form>

	<br>
	<br>
	<table class="table table-hover text-center" style="background-color: #FFE28A;">
      <thead style="background-color: #EAB42A; color: black;"   >
   
            <tr>		
                <th>ID</th>
                <th>PDF File</th>
                <th>Action</th>
            </tr>
		</thead>

            <?php
		if (isset($_GET['search'])) {
			$conn = mysqli_connect("localhost", "root", "", "test_db");
			$filtervalue = $_GET['search'];
			$filterdata = "SELECT * FROM images WHERE CONCAT(id,image) LIKE '%$filtervalue%'";
			$filterdata_run = mysqli_query($conn, $filterdata);
		
			if (mysqli_num_rows($filterdata_run) > 0) {
				foreach ($filterdata_run as $row) {
					?>
					<tr>
						<td><?php echo $row["id"] ?></td>
						<td><?php echo $row["image"] ?></td>
						
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
		
		





            $conn = mysqli_connect("localhost","root","","test_db");
            $sql2 = "SELECT*FROM `images` WHERE 1";
            $result2 = mysqli_query($conn, $sql2);
            while($fetch = mysqli_fetch_assoc($result2))
            {
                echo "";

                ?>

                <tr>
                    <td><?php echo $fetch['id'] ?></td>
                    <td><a href ="./image/<?php echo $fetch['image'] ?>"><?php echo $fetch['image'] ?></a></td>
                    <td><a href="upload_delete.php?id=<?php echo $fetch['id'] ?>" class="btn btn-outline-danger">Delete</a></td>
                </tr>



                <?php
                "";
            } 
            ?>
        </table>

      
       


       </div>
    </div>


              
       
		</section>
     
     

	</div>
</form>



</body>
</html>


<?php

?>



