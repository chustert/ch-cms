<div class="form-group">
  <label for="title">Title</label>
  <input value="<?php echo $title; ?>" type="text" class="form-control" name="title">
</div>

<div class="form-group">
  <label for="category">Category</label>
  <select name="category" id="category" class="form-control" style="width: 25%">
    <?php

    $query = "SELECT * FROM categories WHERE id = $category_id";
    $select_category = mysqli_query($connection, $query); 

    confirmQuery($select_category);

    while($row = mysqli_fetch_assoc($select_category)) {
        $id = $row['id'];
        $title = $row['title'];  

        echo "<option value='{$id}'>{$title}</option>";
    }
    ?>
    <?php

    $query = "SELECT * FROM categories WHERE id NOT IN ('$category_id')";
    $select_categories = mysqli_query($connection, $query); 

    confirmQuery($select_categories);

    while($row = mysqli_fetch_assoc($select_categories)) {
        $id = $row['id'];
        $title = $row['title'];  

        echo "<option value='{$id}'>{$title}</option>";
    }
    ?>
  </select>
</div>

<div class="form-group">
    <label for="image">Image</label>
    <img src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $image; ?>" alt="" width="100" style="display: block;">
    <input type="file" name="image">
</div>

<div class="form-group">
  <label for="image_alttag">Image Alt-Text</label>
  <input value="<?php echo $image_alttag; ?>" type="text" class="form-control" name="image_alttag">
</div>

<div class="form-group">
  <label for="content">Content</label>
  <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?php echo $content; ?></textarea>
</div>

<div class="form-group">
  <label for="author">Author</label>
  <input value="<?php echo $author; ?>" type="text" class="form-control" name="author">
</div>

<div class="form-group">
  <label for="tags">Tags</label>
  <input value="<?php echo $tags; ?>" type="text" class="form-control" name="tags">
</div>

<!-- <div class="form-group">
  <label for="room_gallery">Room Gallery</label>
  <select name="room_gallery" id="room_gallery" class="form-control" style="width: 25%">
    <?php

    // $query = "SELECT * FROM galleries WHERE id = $room_gallery";
    // $select_gallery = mysqli_query($connection, $query); 

    // confirmQuery($select_gallery);

    // while($row = mysqli_fetch_assoc($select_gallery)) {
    //     $id = $row['id'];
    //     $title = $row['title'];  

    //     echo "<option value='{$id}'>{$title}</option>";
    // }
    ?>
    <?php

    // $query = "SELECT * FROM galleries";
    // $select_galleries = mysqli_query($connection, $query); 

    // confirmQuery($select_galleries);

    // while($row = mysqli_fetch_assoc($select_galleries)) {
    //     $id = $row['id'];
    //     $title = $row['title'];  

    //     echo "<option value='{$id}'>{$title}</option>";
    // }
    ?>
  </select>
</div> -->

<div class="form-group">
    <label for="status">Status</label>
    <select name="status" class="form-control" style="width: 25%">
      <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
      <?php

      if($status == 'published') {
        echo "<option value='draft'>Draft</option>";
      } else {
        echo "<option value='published'>Published</option>";
      }

      ?>
    </select>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post" value="Update post">
</div>