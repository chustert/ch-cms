<?php  

if(isset($_POST['create_user'])) {

  $user_firstname = escape($_POST['user_firstname']);
  $user_lastname = escape($_POST['user_lastname']);
  $user_role = escape($_POST['user_role']);

  // $post_image = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['name'];
  // $post_image_temp = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['tmp_name'];

  $username = escape($_POST['username']);
  $user_email = escape($_POST['user_email']);
  $user_password = escape($_POST['user_password']);
  // $post_date = date('d-m-y');
  // $post_comment_count = 4;

  //move_uploaded_file($post_image_temp, "../images/$post_image");
  
  $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

  $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) ";
  $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}') ";

  $create_user_query = mysqli_query($connection, $query);

  confirmQuery($create_user_query);

  echo "User created: " . " " . "<a href='users.php'>View Users</a>";
}

?>




<form action="" method="post" enctype="multipart/form-data">    
     
     <div class="form-group">
         <label for="title">First Name</label>
         <input type="text" class="form-control" name="user_firstname">
      </div>
      
      <div class="form-group">
         <label for="title">Last Name</label>
         <input type="text" class="form-control" name="user_lastname">
      </div>

      <div class="form-group">
        <label for="post_category">Select Role</label>
        <select name="user_role" id="" style="display: block;">
        <option value="subscriber">Select Option</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
        </select>
      </div>

      <div class="form-group">
         <label for="title">Username</label>
         <input type="text" class="form-control" name="username">
      </div>
      
      <div class="form-group">
         <label for="title">Email</label>
         <input type="email" class="form-control" name="user_email">
      </div>

      <div class="form-group">
         <label for="post_image">Password</label>
         <input type="password" class="form-control" name="user_password">
      </div>
      
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
      </div>


</form>
    