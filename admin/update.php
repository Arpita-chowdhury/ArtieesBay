<?php 

session_start();

include"../config/dbConn.php";
include"adminHead.php";

$id = $_GET['updateid'];

?>

 <div class="container" style="height:100vh; " id="data" >
 	<div class="row">
        <div class="col"></div>
        <div class="col-6">
        <h2 style="text-align:center;">Update details for Product_ID = <?php echo $id; ?></h2>
        <form name="form1"  action="" method="post">
           <table class="table table-striped">
                <tr>
                   <td>Product Name</td>
                   <td><input type="text" name="pname"></td>
               </tr>
               
               <tr>
                   <td>Product Category</td>
                   <td>
                       <select name="pcategory">
                           <option value="base">Base</option>
                           <option value="canvas">Canvas</option>
                           <option value="colors">Colors</option>
                           <option value="art_pad">Art pad</option>
                           <option value="brushes">Brushes</option>
                       </select>
                   </td>
               </tr>
               
               <tr>
                   <td>Price</td>
                   <td><input type="number" name="pprice"></td>
               </tr>
               
               
               <tr>
                   <td>Product Image</td>
                   <td><input type="file" name="pimage"></td>
               </tr>
               
              <tr >
                   <td>Description</td>
                   <td>
                       <textarea cols="15"  rows="10"  name="pdes"></textarea>
                   </td>
               </tr>
               
               <tr>
                   <td colspan="2" align="center"><input type="submit" name="submit1" value="Update"></td>
               </tr>
           </table>
            
        </form>
        </div>
        <div class="col"></div>
        
        
        
       <?php 
       

          if(isset($_POST["submit1"])){
            $name = $_POST['pname'];
            $category = $_POST['pcategory'];
            $price = $_POST['pprice'];
            $description = $_POST['pdes'];


            $fnm=$_FILES["pimage"]["name"];   
            $dst="./product_image/".$fnm;
            $dst1="product_image/".$fnm;
            move_uploaded_file($_FILES["pimage"]["tmp_name"],$dst) ; 
            
            $sql = "update product set product_id=$id , name='$name', category='$category', price='$price', image='$dst1', description='$description' where product_id=$id " ;
            $res = mysqli_query($conn,$sql);  
              
            if(!$res)
            {
                echo mysqli_error($conn);
            }
            else
            {
                //echo "updated successfully.";
                header('location:product.php');
            }   
              
          }
        
        ?> 
        
        
        
    </div>
 	
 	
 </div>

 <?php include"adminFoot.php"; ?>


</body>
</html>

