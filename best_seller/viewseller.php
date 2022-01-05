<?php
 include("../include/header1.php");

$conn=mysqli_connect("localhost","root","","admindb");
$query="SELECT * FROM best_seller ORDER BY id DESC LIMIT 4 ";
 $result=mysqli_query($conn,$query);
// print_r($result);
?>
<!DOCTYPE HTML>

<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View- Best Selling Product's </h1>
          </div>
          </div>
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Best Selling Item's</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                  <th>Id</th>
                  <th>Cattitle</th>
                  <th>subcat-Title</th>
                  <th>Title</th>
                    <th>Description</th>
                    <th>Actual-Price</th>
                    <th>Discount</th>
                    <th>Sell-Price</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                $join="SELECT category.id as catid,category.cattitle as catt,subcat.id as subcatid,subcat.cattitle as subb,best_seller.* from best_seller join category on category.id=best_seller.cattitle join subcat on subcat.id=best_seller.subtitle";
                
                $chk=mysqli_query($conn,$join);
                while($row=mysqli_fetch_assoc($chk))
                
                {
                ?>

                  <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['catt'];?></td>
                    <td><?php echo $row['subb'];?></td>
                    <td><?php echo $row['title'];?></td>
                  <td><?php echo $row['description'];?></td>
                    <td><?php echo $row['actualprice']; ?></td>
                    <td><?php echo $row['discountprice']; ?></td>
                    <td><?php echo $row['sellprice']; ?></td>
                    <td><img src="../../pics/bestseller/<?php echo $row['image']; ?>" width="100px" height="100px";>
                    <td class="text-right py-1 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href= "http://projects.test/adminpanel/backend/best_seller/updateseller.php?id=<?php echo $row['id'];?>"  class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="http://projects.test/adminpanel/backend/best_seller/delseller.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this data !?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php
                }
                ?>
                </tr>
     
            </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
<?php
 include("../include/footer1.php");

?>