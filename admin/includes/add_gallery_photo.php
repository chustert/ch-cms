<?php

if(isset($_GET['gly_id'])) {
  $the_gallery_id = $_GET['gly_id'];
}

if(isset($_POST['add_gallery_photo'])) {

  $title = escape($_POST['title']);
  $alttag = escape($_POST['alttag']);

  $image = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['name']);
  $image_temp = $_FILES['image']['tmp_name'];

  move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT'] . "/" . $root_folder . "includes/themes/" . $theme_folder_name . "/images/" . $image);

  $query = "INSERT INTO gallery_photos(title, gallery_id, alttag, image) ";
  $query .= "VALUES('$title', $the_gallery_id, '$alttag', '$image')";

  $add_gallery_photo_query = mysqli_query($connection, $query);

  confirmQuery($add_gallery_photo_query);

  $the_gallery_photo_id = mysqli_insert_id($connection);

  echo "<p class='bg-success'>Photo updated: <a href='galleries.php?source=edit_gallery&gly_id={$the_gallery_id}'>Back to Gallery</a></p>";
}

?>

<h2 style="margin-bottom: 26px;"><small>Add Photo</small></h2>

<form action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title">
      </div>

      <div class="form-group">
        <label for="alttag">Alt-Tag</label>
        <input type="text" class="form-control" name="alttag">
      </div>

      <div class="form-group">
         <label for="image">Photo</label>
         <input type="file" name="image">
      </div>
      
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="add_gallery_photo" value="Add Photo">
      </div>


</form>