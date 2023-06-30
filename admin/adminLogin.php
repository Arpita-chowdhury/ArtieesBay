<?php 

session_start();

include"../config/dbConn.php"

?>




<!DOCTYPE html>
<html>
<head>
	<title>admin-login</title>
	<link rel="stylesheet" type="text/css" href="style-admin-pannel.css">
</head>
<body style="background: radial-gradient(#c6d9ec, #264d73);background-type:cover;
  background-repeat:no-repeat; height:100vh">

<div class="login" style="margin: auto;
	background: #19334d;
  
	border-radius: 5px;
	height: 300px;
	width: 400px;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	margin-top: 100px;">
  <h2 style="font-size: 2rem; color: white;">Log in</h2>
     <form class="login-container" name="form1" action="" method="post" style="text-align: center;">  
        <p><input type="text" placeholder="Username" name="username" style="width: 250px;
	height: 20px;"></p>
        <p><input type="password" placeholder="Password" name="pwd" style="width: 250px;
	height: 20px;"></p>
        <p ><input type="submit" name="submit1" value="Log-in" style="width: 90px; height: 30px; "></p>
        
         
     </form>
      
</div>

<?php
    if(isset($_POST["submit1"]))
    {
       // echo "testing";
        $res=mysqli_query($conn,"select * from admin where username='$_POST[username]' && password='$_POST[pwd]' " );
        
        while($row=mysqli_fetch_array($res))
            
        {
            
          $_SESSION["admin"]=$row["username"];
            
          ?>
          
          <script type="text/javascript">
              window.location="admin.php";
            </script>
          
            <?php
            
        }
        
    }

    
    
    ?>

<?php include"adminFoot.php"; ?>

</body>
</html>
