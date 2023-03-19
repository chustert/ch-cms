<?php  

if(isset($_GET['u_id'])) {
  $the_user_id = $_GET['u_id'];

  $query = "SELECT * FROM users WHERE user_id = $the_user_id";
  $select_users_by_id = mysqli_query($connection, $query);  

  while($row = mysqli_fetch_assoc($select_users_by_id)) {
      $user_id = $row['user_id'];
      $username = $row['username'];
      $user_password = $row['user_password'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_image = $row['user_image'];
      $user_role = $row['user_role'];
  }

  if(isset($_POST['update_user'])) {
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    $username = escape($_POST['username']);
    // $post_image = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['name'];
    // $post_image_temp = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['tmp_name'];
    $user_email = escape($_POST['user_email']);
    $user_password = escape($_POST['user_password']);
    
    //move_uploaded_file($post_image_temp, "../images/$post_image");

    // if(empty($post_image)) {
    //   $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    //   $select_image = mysqli_query($connection, $query);

    //   while ($row = mysqli_fetch_array($select_image)) {
    //     $post_image = $row['post_image'];
    //   }
    // }
    
    if(!empty($user_password)) {
      $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
      $get_user_query = mysqli_query($connection, $query_password);

      confirmQuery($get_user_query);

      $row = mysqli_fetch_array($get_user_query);
      $db_user_password = $row['user_password'];

      if($db_user_password != $user_password) {
        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
      }

      $query = "UPDATE users SET ";
      $query .= "user_firstname = '{$user_firstname}', ";
      $query .= "user_lastname = '{$user_lastname}', ";
      $query .= "user_role = '{$user_role}', ";
      $query .= "username = '{$username}', ";
      $query .= "user_email = '{$user_email}', ";
      $query .= "user_password = '{$hashed_password}' ";
      $query .= "WHERE user_id = {$the_user_id} ";

      $update_user = mysqli_query($connection, $query);

      confirmQuery($update_user);
      
      echo "User Updated" . " | <a href='users.php'>View Users</a>";

    }
   
  }

} else {
  header("Location: index.php");
}

?>

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
        <label for="post_category">Select Role</label>
        <select name="user_role" id="user_role" style="display: block;">
        <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
        <?php
        if($user_role == 'admin') {
          echo "<option value='subscriber'>subscriber</option>";
        } else {
          echo "<option value='admin'>admin</option>";
        }
        ?>
        </select>
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
         <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
      </div>


</form>
