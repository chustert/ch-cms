<?php 
// include "includes/themes/" . $theme_folder_name . "/header.php"; 
getNavigation();
?>


    <div id="layoutAuthentication" class="bg-primary">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                <div class="card-body">
                                    <form role="form" action="includes/registration.php" method="post" autocomplete="off">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="username" id="username" type="text" placeholder="Enter your username" />
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" />
                                            <label for="email">Email address</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="password" id="password" type="password" placeholder="Create a password" />
                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <!-- <a class="btn btn-primary btn-block" href="login.html">Create Account</a> -->
                                                <button class="btn btn-primary btn-block" id="btn-login" type="submit" name="register">Register</button>
                                                <p><?php echo isset($error['username']) ? $error['username'] : ''?></p>
                                                <p><?php echo isset($error['email']) ? $error['email'] : ''?></p>
                                                <p><?php echo isset($error['password']) ? $error['password'] : ''?></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
