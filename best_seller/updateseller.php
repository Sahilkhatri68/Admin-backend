<?php
 include("../include/header1.php");
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","admindb");
$query="SELECT * FROM best_seller WHERE id='$id'";
$check=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($check);
?>

<!DOCTYPE html>
<head>
 
<style>
    .main{
        width: 100%;
    }
    </style>
</head>		

			
			
			<!-- Main content -->
            <div class="main">
 <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col" >
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Best Selling Product's </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
			<div class="card-body">
				<div class="tab-content">
					<div  id="settings">
						<form class="form-horizontal" method="POST" enctype="multipart/form-data"id="myform">
								
                        <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label"> Cat-Title </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="cattitle" value="<?php echo $row['cattitle']; ?>">
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label"> Subtitle </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="subtitle" value="<?php echo $row['subtitle']; ?>">
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label"> Protitle </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="title" value="<?php echo $row['title']; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label" style="width:100px"> Pro-Description </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="description"  value="<?php echo $row['description']; ?>">
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label">Actual-Price </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="actualprice" value="<?php echo $row['actualprice']; ?>">
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label">Discount </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="discountprice" value="<?php echo $row['discountprice']; ?>">
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label">Sell-Price </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="sellprice" value="<?php echo $row['sellprice']; ?>">
									</div>
								</div>
                                
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label"> Image </label>
									<div class="col-sm-10">
                                <img src="../../pics/bestseller/<?php echo $row['image']; ?>" width="250px" height="250px"><br><br><br>
                                <input type="file" name="image" value="<?php echo $row['image']; ?>">
									</div>
								  </div>
								 </br>
								<div class="form-group row">
									<div class="offset-sm-2 col-sm-10">
									  <button type="submit" name="update" class="btn btn-primary"> Update</button>
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</section>
</div>		
			
		
		
 
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

 <script>
 var validator = $( "#myform" ).validate({
rules: {
subtittle: "required",
subdescription: "required",
subimage: "required"
},
 });
//validator.form();
 </script>



<?php
if(isset($_POST['update'])){
    $cattitle=$_POST['cattitle'];
    $subtitle=$_POST['$subtitle'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $actualprice=$_POST['actualprice'];
    $discountprice=$_POST['discountprice'];
    $sellprice=$_POST['sellprice'];
    if(!empty($_FILES['image']['name'])){;
        $image=$_FILES['image']['name'];
        $tmp_img=$_FILES['image']['tmp_name'];             
        $path="../../pics/bestseller/".$image;
        move_uploaded_file($tmp_img,$path);
    
    }      
    else{
        $path=$row['image'];
    }   
    $update="UPDATE best_seller SET cattitle='$cattitle',subtitle='$subtitle',title='$title', description='$description', actualprice='$actualprice',discountprice='$discountprice',sellprice='$sellprice',image='$image' WHERE id='$id'";
    $updated=mysqli_query($conn,$update);
    if($updated){
        ?>
<script>
    window.location.href="http://projects.test/adminpanel/backend/best_seller/viewseller.php";
    </script>    
    <?php
}
    else{
        echo"Error in updating";
    }
}

include("../include/footer1.php");

?>





















