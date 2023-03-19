<?php

if(isset($_GET['glyph_id'])) {
  $the_gallery_photo_id = $_GET['glyph_id'];
}
if(isset($_GET['gly_id'])) {
  $the_gallery_id = $_GET['gly_id'];
}

$query = "SELECT * FROM gallery_photos WHERE id = $the_gallery_photo_id";
$select_gallery_photo_by_id = mysqli_query($connection, $query);  

  while($row = mysqli_fetch_assoc($select_gallery_photo_by_id)) {
    $id = $row['id'];
    $gallery_id = $row['gallery_id'];
    $title = $row['title'];
    $alttag = $row['alttag'];
    $image = $row['image'];
    }

  if(isset($_POST['update_gallery_photo'])) {
    $title = escape($_POST['title']);
    $alttag = escape($_POST['alttag']);
    $image = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['name']);
    $image_temp = $_FILES['image']['tmp_name'];
    
    move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT'] . "/" . $root_folder . "includes/themes/" . $theme_folder_name . "/images/" . $image);

    if(empty($image)) {
      $query = "SELECT * FROM gallery_photos WHERE id = $the_gallery_photo_id ";
      $select_image = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_array($select_image)) {
        $image = $row['image'];
      }
    }

    $query = "UPDATE gallery_photos SET ";
    $query .= "title = '{$title}', ";
    $query .= "alttag = '{$alttag}', ";
    $query .= "image = '{$image}' ";
    $query .= "WHERE id = {$the_gallery_photo_id} ";

    $update_gallery_photo = mysqli_query($connection, $query);

    confirmQuery($update_gallery_photo);

    echo "<p class='bg-success'>Photo updated: <a href='galleries.php?source=edit_gallery&gly_id={$the_gallery_id}'>Back to Gallery</a></p>";
  }
?>

<h2 style="margin-bottom: 26px;"><small>Edit Gallery Photo</small></h2>

<form action="" method="post" enctype="multipart/form-data">    

      <div class="form-group">
        <label for="title">Title</label>
        <input value="<?php echo $title; ?>" type="text" class="form-control" name="title">
      </div>

      <div class="form-group">
        <label for="alttag">Alt-Tag</label>
        <input value="<?php echo $alttag; ?>" type="text" class="form-control" name="alttag">
      </div>

      <div class="form-group">
         <label for="image">Photo</label>
         <img src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $image; ?>" alt="" width="100" style="display: block;">
         <input type="file" name="image">
      </div>

      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_gallery_photo" value="Update photo">
      </div>

</form>