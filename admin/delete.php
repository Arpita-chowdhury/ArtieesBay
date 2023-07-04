<?php
include"../config/dbConn.php";

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "delete from product where product_id=$id";
    $res = mysqli_query($conn,$sql);
    
    if($res){
        //echo"Deleted successfully";
        header('location:product.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>