<?php
$conn=mysqli_connect("localhost","root","","admindb");

$id=$_GET['id'];
$query="DELETE  FROM best_seller WHERE id='$id' ";
$check=mysqli_query($conn,$query);
if($check)
{
    header('location: http://projects.test/adminpanel/backend/best_seller/viewseller.php');
}
else{
    echo"problem in deletion ";
}
?>