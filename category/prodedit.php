<?php
 include("../include/header1.php");
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","admindb");
$query="SELECT * FROM product WHERE id='$id'";
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
              <h3 class="card-title">Update Product </h3>

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
									  <input type="text"  class="form-control" name="cattitle" value="<?php echo $row['cattitle']; ?>" id="inputName">
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label"> Subtitle </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="subtitle" value="<?php echo $row['subtitle']; ?>" id="inputName">
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label"> Protitle </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="protitle" value="<?php echo $row['protitle']; ?>" id="inputName">
									</div>
								</div>
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label" style="width:100px"> Pro-Description </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="prodescription"  value="<?php echo $row['prodescription']; ?>"id="inputName">
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label">Actual-Price </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="actualprice"  id="actualprice " value="<?php echo $row['actualprice']; ?>" >
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label">Discount </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="discount" id=" discount" value="<?php echo $row['discount']; ?>" >
									</div>
								</div>
                                <div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label">Sell-Price </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="sellprice" id="sellprice"  value="<?php echo $row['sellprice']; ?>" >
									</div>
								</div>
									 <script>
        getPrice = function() {
            var numVal1 = Number(document.getElementById("actualprice").value);
            var numVal2 = Number(document.getElementById("discount").value) 
            var discount= (numVal1*numVal2)/100;

            var totalValue = numVal1-discount;
            document.getElementById("sellprice").value = totalValue.toFixed(2);
        }
    </script>
                                
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label"> Image </label>
									<div class="col-sm-10">
                                <img src="../photos/productimg/<?php echo $row['proimage']; ?>"><br><br><br>
                                <input type="file" name="proimage" value="<?php echo $row['proimage']; ?>">
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script>
$("#category").change(function()
{
	var id = $("#category").val();
        $.ajax({
            url:"subcatdropdown.php",    
            type: "POST",    
            data: {catid:id},
            success:function(data){
                $("#subcat").replaceWith(data);
            },
        });
    });
</script>

s
			
		
 
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

 <script>
 var validator = $( "#catform" ).validate({
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
	$subtitle=$_POST['subtitle'];
	$protitle=$_POST['protitle'];
	$prodescription=$_POST['prodescription'];
	$prodescription=$_POST['actualprice'];
	$discount=$_POST['discount'];
	$sellprice=$_POST['sellprice'];
	if(!empty($_FILES['proimage']['name'])){;
        $proimage=$_FILES['proimage']['name'];
        $tmp_img=$_FILES['proimage']['tmp_name'];             
        $path="../photos/productimg/".$proimage;
		   
        move_uploaded_file($tmp_img,$path);
    
    }      
    else{
        $path=$row['image'];
    }   
    $update="UPDATE  product SET cattitle='$cattitle', subtitle='$subtitle', protitle='$protitle',prodescription='$prodescription',discount='$discount',sellprice='$sellprice',proimage='$proimage' WHERE id='$id'";
    
    $updated=mysqli_query($conn,$update);
    if($updated){
        ?>
<script>
    window.location.href="http://projects.test/adminpanel/backend/category/prodview.php";
    </script>    
    <?php
}
    else{
        echo"Error in updating";
    }
}

include("../include/footer1.php");

?>





















