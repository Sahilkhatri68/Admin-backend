<?php
include("../include/header1.php");


/////// its for sub cat//////////////////////////

$conn=mysqli_connect("localhost","root","","admindb");
if(isset($_POST['submit'])){
	$cattitle=$_POST['cattitle'];
	$subtitle=$_POST['subtitle'];
$title=$_POST['title'];
$description=$_POST['description'];
$actualprice=$_POST['actualprice'];
$discount=$_POST['discount'];
$sellprice=$_POST['sellprice'];
$image=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$path="../../pics/bestseller/".$image;
move_uploaded_file($tmp_name,$path);

$insert="INSERT INTO best_seller(cattitle,subtitle,title,description,actualprice,discountprice,sellprice,image) VALUES('$cattitle','$subtitle','$title','$description','$actualprice','$discount','$sellprice','$image')";
// print_r($insert);
$qyr=mysqli_query($conn,$insert);
print_r($qyr);


if($qyr){ ?>
<script> 
 	window.location.href="http://projects.test/adminpanel/backend/best_seller/viewseller.php";
</script>
<?php }
else{
    echo"error,error,error,error,error,error,error,error,error,error,error,error";
}
}


?>
<!DOCTYPE html>
<head>
<style>
    .main{
        width: 100%;
    }
    </style>
</head>		

<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary" >
            <div class="card-header">
              <h3 class="card-title" >Add Best Selling Product'S </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
			
            <div class="card-body"> 
			<form method="post" enctype="multipart/form-data" id="proform" style="width:100%;">
			
			<div class="form-group">
                <label for="inputStatus">cat-Title</label>
                <select id="inputStatus" name="cattitle" id="category" class="form-control custom-select">
				<option>Select Cat Title</option>
								<?php
										$qry="SELECT * FROM category";
	
										$var=mysqli_query($conn,$qry);
										
										while($fetch=mysqli_fetch_assoc($var))
										
									{
									?>
									<option value="<?php echo $fetch['id'] ; ?>"> <?php echo $fetch['cattitle'] ;  ?></option> 
									<?php
									
										
								} 
									?>	
									</select>
							</div>
			  
			
			
			<div class="form-group">
                <label for="inputStatus">Sub Category Title</label>
                <select id="inputStatus" name="subtitle"  class="form-control custom-select">
				<option>Select Sub category</option>
		
						<?php 

				$select="SELECT * from subcat";
				$query=mysqli_query($conn,$select);
				while($fet=mysqli_fetch_assoc($query)){
						
			?>
		  
			<option value="<?php echo $fet['id']; ?>"><?php echo $fet['subtitle']; ?></option>
		
		<?php }?>
		 
	   </select>
              </div>
			 
              <div class="form-group">
                <label for="inputName">Product Title</label>
                <input type="text" id="inputName" name="title" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Product description</label>
                <textarea id="inputDescription"name="description" class="form-control" rows="2"></textarea>
              </div>
			 <div class="form-group">
                <label for="inputName">Actual price</label>
                <input type="number" id="price" name="actualprice" class="form-control">
              </div>
			  
			   <div class="form-group">
                <label for="inputName">Descount</label>
                <input type="number" id="discount" name="discount" class="form-control" onkeyup="getPrice()">
              </div>
			  
			   <div class="form-group">
                <label for="inputName">Sell price</label>
                <input readonly id="total" name="sellprice" class="form-control">
              </div>
			 <script>
        getPrice = function() {
            var numVal1 = Number(document.getElementById("price").value);
            var numVal2 = Number(document.getElementById("discount").value) 
            var discount= (numVal1*numVal2)/100;

            var totalValue = numVal1-discount;
            document.getElementById("total").value = totalValue.toFixed(2);
        }
    </script>
             
              <div class="form-group">
                <label for="inputProjectLeader">Project Image</label>
                <input type="file" id="inputProjectLeader"name="image" class="form-control">
              </div>
			  <div class="card-footer">
			<button type="submit" class="btn btn-primary" name="submit">submit</button>
			</div></form>
				</div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
 </section>
 </div>
 

			
			
		
 
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<!-- 
 <script>
 var validator = $( "#catform" ).validate({
rules: {
subtittle: "required",
subdescription: "required",
subimage: "required"
},
 });
//validator.form();
 </script> -->




<?php
include("../include/footer1.php");
?>



