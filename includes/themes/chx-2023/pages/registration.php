
<?php  include "includes/themes/" . $theme_folder_name . "/header.php"; ?>





<!-- Navigation -->

<main role="main" class="flex-shrink-0">
    <div class="container">

        <div class="d-flex align-items-center">

            <div class="mx-auto login-min-width">
                                                                        

                    <h1><img src="images/orange-line.png" alt=""> Register</h1>
                    
                    <form role="form" action="includes/registration.php" method="post" autocomplete="off" class="form-register">

                        <label for="username" class="sr-only">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="on" value="<?php echo isset($username) ? $username : ''?>">

                        <label for="email" class="sr-only">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email address" autocomplete="on" value="<?php echo isset($email) ? $email : ''?>">

                        <label for="password" class="sr-only">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">

                        <button class="btn btn-lg btn-primary btn-block" id="btn-login" type="submit" name="register">Register</button>
                        <p><?php echo isset($error['username']) ? $error['username'] : ''?></p>
                        <p><?php echo isset($error['email']) ? $error['email'] : ''?></p>
                        <p><?php echo isset($error['password']) ? $error['password'] : ''?></p>
                    </form>


            </div>
                                  
        </div>

    </div>
</main>
