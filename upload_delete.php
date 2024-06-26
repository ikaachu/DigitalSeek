<?php
$id = $_GET['id'];
$con = mysqli_connect("localhost","root","","test_db");
$sql = "DELETE FROM `images` WHERE `id`='$id'";
$result = mysqli_query($con, $sql);
if($result)
{
    header("location: upload.php");
}

?>