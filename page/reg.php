<?php 
  include"../head.php";
  include"../config/dbConn.php";
?>
    <!------Registration Form------->

    <section class="vh-100">

        <div class="container h-100">

          <div class="row d-flex justify-content-center align-items-center h-100">

            <div class="col-lg-12 col-xl-11">

              <div class="card text-black" style="border-radius: 25px;">

                <div class="card-body p-md-4">

                  <div class="row justify-content-center">

                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                        <!--registration Form-->
                        <form class="mx-1 mx-md-4" style="font-size: small;" 
                        method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                        <p><span class="error link-danger">* required field</span></p>

                        <?php
                        // define variables and set to empty values
                        $name = $email = $pass = $conPass = $agree = "";
                        $nameErr = $emailErr = $passErr = $conPassErr = $agreeErr = "";

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                          if (empty($_POST["name"])) {
                            $nameErr = "Name is required";
                          } else {
                            $name = test_input($_POST["name"]);
                            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                              $nameErr = "Only letters and white space allowed";
                            }
                          }
                          
                          if (empty($_POST["email"])) {
                            $emailErr = "Email is required";
                          } else {
                            $email = test_input($_POST["email"]);
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                              $emailErr = "Invalid email format";
                            }
                          }
                            
                          if (empty($_POST["pass"])) {
                            $passErr = "Choose a strong password";
                          } else {
                            $pass = test_input($_POST["pass"]);
                          }
                        
                          if (empty($_POST["conPass"])) {
                            $conPassErr = "Enter the same password";
                          } else {
                            $conPass = test_input($_POST["conPass"]);
                              if($pass != $conPass){
                              $conPassErr = "Please enter same password";
                            }
                          }

                          
                        
                          
                        }

                        function test_input($data) {
                          $data = trim($data);
                          $data = stripslashes($data);
                          $data = htmlspecialchars($data);
                          return $data;
                        }
                        ?>

      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" name="name" id="form3Example1c" class="form-control">
                            <label class="form-label" for="form3Example1c">Your Name</label>
                            <span class="error link-danger">* <?php echo $nameErr;?></span>
                            
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" name="email" id="form3Example3c" class="form-control">
                            <label class="form-label" for="form3Example3c">Your Email</label>
                            <span class="error link-danger">* <?php echo $emailErr;?></span>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" name="pass" id="form3Example4c" class="form-control" >
                            <label class="form-label" for="form3Example4c">Password</label>
                            <span class="error link-danger">* <?php echo $passErr;?></span>
                          </div>
                        </div>
      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" name="conPass" id="form3Example4cd" class="form-control" >
                            <label class="form-label" for="form3Example4cd">Confirm Password</label>
                            <span class="error link-danger">* <?php echo $conPassErr;?></span>
                          </div>
                        </div>
      
                        <div class="form-check d-flex justify-content-center mb-5">
                          <input class="form-check-input me-2" type="checkbox" value="agree" id="form2Example3c" />
                          <label class="form-check-label" for="form2Example3">
                            I agree all statements in <a href="#!">Terms of service</a>
                          </label>
                        </div>
      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <input class="btn btn-primary btn-lg" type="submit" value="Sign Up" name="submitReg" />
                        </div>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.php" class="link-success fs-6">Sign In</a></p>
                        
                         
      
                      </form>
      
                    </div>
                    <?php 
                        if(isset($_POST["submitReg"]))
                        {
                        
                          $insert = mysqli_query($conn,"insert into customer values('','$_POST[name]','$_POST[email]','$_POST[conPass]')");  
                            
                          if(!$insert)
                          {
                              echo "Something went wrong.";
                          }
                        
                            
                        }
                        
                        ?>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                      <img src="https://media.istockphoto.com/id/1387521474/vector/elderly-woman-with-stands-near-an-easel-and-paints-a-with-a-brush-on-an-isolated-canvas.jpg?s=612x612&w=0&k=20&c=3Z_mSRHVLBAPlN_Lb4l-lvdEJcn07foEkJQbY04giKM="
                        class="img-fluid" alt="Sample image">


      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


<?php 
  include"../foot.php";
?>