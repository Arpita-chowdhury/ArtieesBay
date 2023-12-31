<?php 
session_start();

  include"../head.php";
  include"../config/dbConn.php";
?>
    <!------Login Form------->

    <section class="vh-75">
        <div class="container-fluid h-custom">

            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://img.freepik.com/free-vector/paint-brushes-color-palette_1308-126704.jpg"
                    class="img-fluid" alt="Sample image">
                </div>
                

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" style="font-size: small;">
                    <form class="login-container" name="form1" action="" method="post">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead h3 fw-normal mb-0 me-3">Sign in with</p>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>
      
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>
      
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>

      
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>
      
                        
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label class="form-label" for="form3Example3">Email address</label>
                        </div>
      
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                        <input type="password" name="pass" id="" class="form-control form-control-lg" placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Password</label>
                        </div>
      
                        
                        <div class="d-flex justify-content-between align-items-center">

                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">Remember me</label>
                            </div>

                            <a href="#" class="text-body">Forgot password?</a>

                        </div>
      
                        
                        <div class="text-center text-lg-start mt-4 pt-2">

                            <input type="submit" name="submitLog" value="Log In" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">


                            <!--regisration form link-->
                            
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="reg.php" class="link-danger fs-6">Sign Up</a></p>
                        
                        </div>

                        
      
                    </form>

                    <?php
                        if(isset($_POST["submitLog"]))
                        {
                            $res=mysqli_query($conn,"select email,password from customer where email='$_POST[email]' && password='$_POST[pass]' " );
                            
                            while($row=mysqli_fetch_array($res))
                                
                            {
                                
                                $_SESSION["customer"]=$row["email"];
                                
                            ?>
                            
                            <script type="text/javascript">
                                window.location="../index.php";
                            </script>
                            
                            <?php
                                
                            }
                            
                        } ?>
            
                </div>
          
            </div>
        
        </div>
        
    </section>

    <hr class="my-5" />


    <?php 
  include"../foot.php";
?>
    