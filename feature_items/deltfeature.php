<?php
$conn=mysqli_connect("localhost","root","","admindb");

$id=$_GET['id'];
$query="DELETE  FROM featuring WHERE id='$id' ";
$check=mysqli_query($conn,$query);
if($check)
{
    header('location: http://projects.test/adminpanel/backend/feature_items/viewfeature.php');
}
else{
    echo"problem in deletion ";
}
?>