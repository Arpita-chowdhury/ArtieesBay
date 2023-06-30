<?php 

session_start();

include"../config/dbConn.php";
include"adminHead.php";

 ?>


<div class="container">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-6">
    <h2 style="text-align:center">All Products</h2>
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
     
     $res=mysqli_query($conn,"select * from product");
     
     while($row=mysqli_fetch_array($res))
     { 
       
     ?>



    <tr>
      <td><?php echo $row["product_id"]; ?></td>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["category"]?></td> 
      <td>BDT <?php echo $row["price"]?></td>
      <td><img style="height:100px; width:100px;" src="<?php echo $row["image"]; ?>"></td>
      <td><?php echo $row["description"]?></td>   
      <td><button class="btn btn-secondary" onclick="productUpdate(<?php $row['product_id']; ?>)">Update</button></td>  
      <td><button class="btn btn-dark" onclick="productDelete(<?php $row['product_id'] ?>)">Delete</button></td> 
      
    </tr>

      <?php
         
     }
     
     ?>
     
  </table>

  <?php
     function productDelete($id){
      mysqli_query($conn,"delete * from product where product_id = $id");
    }
     ?>

    <?php
      function productUpdate($id){

          ?>
          
          <script type="text/javascript">
              window.location="productUpdate.php";
            </script>
          
            <?php
            
        }
    
    ?> 

    </div>
    <div class="col"></div>
  </div>
</div>


<?php include"adminFoot.php"; ?>


</body>
</html>
