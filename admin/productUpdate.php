<?php 

session_start();

include"../config/dbConn.php";
include"adminHead.php";

 ?>


<div class="container">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-6">
    <h2 style="text-align:center">Update Product details</h2>
    <table class="table table-striped">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Name</th>
        <th class="text-center">Category</th>
        <th class="text-center">Price</th>
        <th class="text-center">Image</th>
        <th class="text-center">Description</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>


    <?php 
    $id = $_GET['id'];
     
     $res=mysqli_query($conn,"select * from product where product_id=$id ");
     
     while($row=mysqli_fetch_array($res))
     { 
       
     ?>

    <tr>
      <td><?php echo $row["product_id"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["category"]?></td> 
      <td><?php echo $row["price"]?></td>
      <td><img style="height:100px; width:100px;" src="<?php echo $row["image"]; ?>"></td>
      <td><?php echo $row["description"]?></td>      
      </tr>

    <?php
     }
     ?>
     
      
  </table>
    </div>
    <div class="col"></div>
  </div>
</div>


<?php include"adminFoot.php"; ?>


</body>
</html>
