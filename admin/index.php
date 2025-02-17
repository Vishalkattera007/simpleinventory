<?php
    include 'header.php';
?>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container bg-white mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 align-self-center">
                        <div class="sign-in-from">
                            <h1 class="mb-0 dark-signin">Sign in</h1>
                            <p>Enter your email address and password to access admin panel.</p>
                            <form class="mt-4" action="dashboard.php" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="loginEmail" class="form-control mb-0" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <!-- <a href="#" class="float-right">Forgot password?</a> -->
                                    <input type="password" name="loginPass" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                 <label for="exampleFormControlSelect1">Select Your Role</label>



                                 <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">--Select your role--</option>
                                    <?php
                                        // $fetch_roles_sql = "slect role from roles";
                                        $result = mysqli_query($con, "select role from roles");
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . htmlspecialchars($row['role']) . '">' . htmlspecialchars($row['role']) . '</option>';
                                            }
                                        } else {
                                            echo '<option disabled>Error fetching roles</option>';
                                        }
                                    ?>
                                 </select>
                              </div>
                                <div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <!-- <label class="custom-control-label" for="customCheck1">Remember Me</label> -->
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center">
                        <div class="sign-in-detail text-white">
                            <!-- <a class="sign-in-logo mb-5" href="#"><img src="images/logo-white.png" class="img-fluid" alt="logo"></a> -->
                            <div class="slick-slider11" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="images/login/userm.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your Users</h4>
                                    <p>Manage Users by their roles and accessabilities</p>
                                </div>
                                <div class="item">
                                    <img src="images/login/products.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your Products</h4>
                                    <p>You can easily enter your products data just in few Fills & Clicks</p>
                                </div>
                                <!-- <div class="item">
                                    <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your Assigning</h4>
                                    <p>You can manage your employees assigning process to Units, Blocks & Stges</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="js/smooth-scrollbar.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
   </body>
</html>