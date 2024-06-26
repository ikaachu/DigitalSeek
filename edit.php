<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $Collection = $_POST['Collection'];
  $Record_Format = $_POST['Record_Format'];
  $Title = $_POST['Title'];
  $Creator = $_POST['Creator'];
  $Description = $_POST['Description'];
  $Type = $_POST['Type'];
  $Date = $_POST['Date'];

  $sql = "UPDATE `crud` SET `Collection`='$Collection',`Record_Format`='$Record_Format',`Title`='$Title',
  `Creator`='$Creator', `Description`='$Description',`Type`='$Type', `Date`='$Date' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: manage.php?msg=Data updated successfully");
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

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
  crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
  integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Manage Inventory</title>
</head>

<body style="background-color: #01294A;" >
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #F3F3F3;">
  Top Level Collections
  </nav>

  <div class="container" style="color:white;">
    <div class="text-center mb-4">
      <h3>Edit Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">

      
      <div class="form-group mb-3" style="color:white;" >
            <div class="mb-3" >         
     
      <div class="form-group mb-3" style="color:white;">
          <label>Collection:</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="Collection" id="Existing" value="Existing" 
          <?php echo ($row["Collection"] == 'Existing') ? "checked" : ""; ?>>
          <label for="Existing" class="form-input-label">Existing</label>
          &nbsp;
          <input type="radio" class="form-check-input" name="Collection" id="New" value="New" 
          <?php echo ($row["Collection"] == 'New') ? "checked" : ""; ?>>
          <label for="New" class="form-input-label">New</label>
        </div>     

                    <div class="row mb-3" style="color:white;">       
                    <div class="mb-3">
                <label class="form-label">Record Format:</label>
                <select class="form-select" name="Record_Format">                  
                    <option value="" selected disabled>Look-up or select</option>
                    <option value="MARC21 Bibliography" <?php echo ($row['Record_Format'] == 'MARC21 Bibliography') ? 'selected' : ''; ?>>
                      MARC21 Bibliography
                    </option>
                    <option value="Dublin Core" <?php echo ($row['Record_Format'] == 'Dublin Core') ? 'selected' : ''; ?>>
                      Dublin Core
                    </option>
                </select>
              </div>




          <div class="mb-3" style="color:white;">
            <label class="form-label">Title:</label>
            <input type="text" class="form-control" name="Title" value="<?php echo $row['Title'] ?>">
          </div>
        </div>

        <div class="mb-3" style="color:white;">
          <label class="form-label">Creator</label>
          <input type="text" class="form-control" name="Creator" value="<?php echo $row['Creator'] ?>">
        </div>

        <div class="mb-3" style="color:white;">
          <label class="form-label">Description</label>
          <input type="text" class="form-control" name="Description" value="<?php echo $row['Description'] ?>">
        </div>

     
        <div class="row mb-3" style="color:white;">    
            <div class="col">
              <label class="form-label">Type:</label>
              <select class="form-select" name="Type">
                  <option value="" selected disabled>Look-up or select</option>
                  <option value="Book" <?php echo ($row['Type'] == 'Book') ? 'selected' : ''; ?>>Book</option>
                  <option value="Computer file" <?php echo ($row['Type'] == 'Computer file') ? 'selected' : ''; ?>>Computer file</option>
                  <option value="Journal" <?php echo ($row['Type'] == 'Journal') ? 'selected' : ''; ?>>Journal</option>
                  <option value="Map" <?php echo ($row['Type'] == 'Map') ? 'selected' : ''; ?>>Map</option>
                  <option value="Music" <?php echo ($row['Type'] == 'Music') ? 'selected' : ''; ?>>Music</option>
                  <option value="Mixed material" <?php echo ($row['Type'] == 'Mixed material') ? 'selected' : ''; ?>>Mixed material</option>
                  <option value="Visual material" <?php echo ($row['Type'] == 'Visual material') ? 'selected' : ''; ?>>Visual material</option>
              </select>
            </div>
            <br>
           


          <div class="col" style="color:white;">
            <label class="form-label">Date</label>
            <input type="Date" class="form-control" name="Date" value="<?php echo $row['Date'] ?>">
          </div>
        </div>

       
        
        <div>     
        <div class="d-flex justify-content-end mt-3" style="color:white;">
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="manage.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>
  <br>
  <br>
  <br>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>