<?php 
$title = "Login";
include 'Public/Includes/head.php'; ?>

    <body class="authentication-bg">
            <div class="account-pages mt-5 pt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-pattern">
    
                                <div class="card-body p-4">
                                    
                                    <div class="text-center w-75 m-auto">
                                        <a href="index.php?p=login">
                                            <span><img src="assets/images/logo-darksj.png" alt="" height="18"></span>
                                        </a>
                                        <h5 class="text-uppercase text-center font-bold mt-4">Log In</h5>

                                    </div>
    
                                    
                                        <form class="form-horizontal form-material" id="loginform" action="<?= WEBROOT?>login" method="post">
    
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress" name="emailaddress" required="" placeholder="Enter your email">
                                        </div>
    
                                        <div class="form-group mb-3">
                                            <a href="pages-recoverpw.html" class="text-muted float-right"><small>Forgot your password?</small></a>

                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" required="" name="password" id="password" placeholder="Enter your password">
                                        </div>
    
                                        <div class="form-group mb-3">
                                            <div class="custom-control custom-checkbox checkbox-success">
                                                <input type="checkbox" class="custom-control-input"name="remember_me" id="checkbox-signin" checked>
                                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                            </div>
                                        </div>
    
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-gradient btn-block" type="submit"> Log In </button>
                                        </div>
    
                                    </form>
    
                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->
    
                       
    
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->


        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>