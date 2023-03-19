<?php include "includes/admin_header.php"; ?>
<?php 
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_profile_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        // $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}
?>
<?php 
if(isset($_POST['update_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['username'];
    // $post_image = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['name'];
    // $post_image_temp = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['tmp_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    
    //move_uploaded_file($post_image_temp, "../images/$post_image");

    // if(empty($post_image)) {
    //   $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    //   $select_image = mysqli_query($connection, $query);

    //   while ($row = mysqli_fetch_array($select_image)) {
    //     $post_image = $row['post_image'];
    //   }
    // }

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}' ";
    $query .= "WHERE username = '{$username}' ";

    $update_user = mysqli_query($connection, $query);

    confirmQuery($update_user);
}
?>

    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">    

                         <div class="form-group">
                             <label for="title">First Name</label>
                             <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
                          </div>
                          
                          <div class="form-group">
                             <label for="title">Last Name</label>
                             <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
                          </div>

                          <div class="form-group">
                             <label for="title">Username</label>
                             <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
                          </div>
                          
                          <div class="form-group">
                             <label for="title">Email</label>
                             <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
                          </div>

                          <div class="form-group">
                             <label for="post_image">Password</label>
                             <input autocomplete="off" type="password" class="form-control" name="user_password">
                          </div>
                          
                          <div class="form-group">
                             <input class="btn btn-primary" type="submit" name="update_user" value="Update Profile">
                          </div>


                    </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
