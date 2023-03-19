<!-- <div class="form-group">
  <label for="page_content_gallery">Content  Gallery</label>
  <select name="page_content_gallery" class="form-control" style="width: 25%">
    <?php
    if ($page_content_gallery == 0 || empty($page_content_gallery)) {
      echo "<option value=''>Select Gallery</option>";
    } else {
      $query = "SELECT * FROM galleries WHERE id = $page_content_gallery";
      $select_galleries = mysqli_query($connection, $query); 

      confirmQuery($select_galleries);

      while($row = mysqli_fetch_assoc($select_galleries)) {
        $gallery_id = $row['id'];
        $title = $row['title'];  

        echo "<option value='{$gallery_id}'>{$title}</option>";
      }
    }
    ?>
    <?php
    $query = "SELECT * FROM galleries WHERE id NOT IN ('$page_content2_gallery')";
    $select_galleries = mysqli_query($connection, $query); 

    confirmQuery($select_galleries);

    while($row = mysqli_fetch_assoc($select_galleries)) {
        $id = $row['id'];
        $title = $row['title'];  

        echo "<option value='{$id}'>{$title}</option>";
    }
    ?>
  </select>
</div>

<div class="form-group">
  <label for="page_content2_title">Content 2 Titlte</label>
  <input value="<?php echo $page_content2_title; ?>" type="text" class="form-control" name="page_content2_title">
</div>

<div class="form-group">
  <label for="page_content2">Content 2</label>
  <textarea class="form-control" name="page_content2" id="content2" cols="30" rows="10"><?php echo $page_content2; ?></textarea>
</div>

<div class="form-group">
  <label for="page_content2_gallery">Content 2 Gallery</label>
  <select name="page_content2_gallery" class="form-control" style="width: 25%">
    <?php
    if ($page_content2_gallery == 0 || empty($page_content2_gallery)) {
      echo "<option value=''>Select Gallery</option>";
    } else {
      $query = "SELECT * FROM galleries WHERE id = $page_content2_gallery";
      $select_galleries = mysqli_query($connection, $query); 

      confirmQuery($select_galleries);

      while($row = mysqli_fetch_assoc($select_galleries)) {
        $id = $row['id'];
        $title = $row['title'];  

        echo "<option value='{$id}'>{$title}</option>";
      }
    }
    ?>
    <?php
    $query = "SELECT * FROM galleries WHERE id NOT IN ('$page_content2_gallery')";
    $select_galleries = mysqli_query($connection, $query); 

    confirmQuery($select_galleries);

    while($row = mysqli_fetch_assoc($select_galleries)) {
        $id = $row['id'];
        $title = $row['title'];  

        echo "<option value='{$id}'>{$title}</option>";
    }
    ?>
  </select>
</div>

<div class="form-group">
  <label for="page_content3_title">Content 3 Title</label>
  <input value="<?php echo $page_content3_title; ?>" type="text" class="form-control" name="page_content3_title">
</div>

<div class="form-group">
  <label for="page_content3">Content 3</label>
  <textarea class="form-control" name="page_content3" id="content3" cols="30" rows="10"><?php echo $page_content3; ?></textarea>
</div>

<div class="form-group">
  <label for="page_content3_gallery">Content 3 Gallery</label>
  <select name="page_content3_gallery" class="form-control" style="width: 25%">
    <?php
    if ($page_content3_gallery == 0 || empty($page_content3_gallery)) {
      echo "<option value=''>Select Gallery</option>";
    } else {
      $query = "SELECT * FROM galleries WHERE id = $page_content3_gallery";
      $select_galleries = mysqli_query($connection, $query); 

      confirmQuery($select_galleries);

      while($row = mysqli_fetch_assoc($select_galleries)) {
        $gallery_id = $row['id'];
        $title = $row['title'];  

        echo "<option value='{$gallery_id}'>{$title}</option>";
      }
    }
    ?>
    <?php
    $query = "SELECT * FROM galleries WHERE id NOT IN ('$page_content3_gallery')";
    $select_galleries = mysqli_query($connection, $query); 

    confirmQuery($select_galleries);

    while($row = mysqli_fetch_assoc($select_galleries)) {
        $id = $row['id'];
        $title = $row['title'];  

        echo "<option value='{$id}'>{$title}</option>";
    }
    ?>
  </select>
</div>

<div class="form-group">
  <label for="page_CTA_title">CTA Title</label>
  <input value="<?php echo $page_CTA_title; ?>" type="text" class="form-control" name="page_CTA_title">
</div>

<div class="form-group">
  <label for="page_CTA_content">CTA Content</label>
  <textarea class="form-control" name="page_CTA_content" id="content4" cols="30" rows="10"><?php echo $page_CTA_content; ?></textarea>
</div>

<div class="form-group">
  <label for="page_CTA_button">CTA button</label>
  <input value="<?php echo $page_CTA_button; ?>" type="text" class="form-control" name="page_CTA_button">
</div>

<div class="form-group">
  <label for="page_CTA_link">CTA Link</label>
  <input value="<?php echo $page_CTA_link; ?>" type="text" class="form-control" name="page_CTA_link">
</div>

<div class="form-group">
  <label for="page_CTA2_title">CTA 2 Title</label>
  <input value="<?php echo $page_CTA2_title; ?>" type="text" class="form-control" name="page_CTA2_title">
</div>

<div class="form-group">
  <label for="page_CTA2_content">CTA 2 Content</label>
  <textarea class="form-control" name="page_CTA2_content" id="content4" cols="30" rows="10"><?php echo $page_CTA2_content; ?></textarea>
</div>

<div class="form-group">
  <label for="page_CTA2_button">CTA 2 button</label>
  <input value="<?php echo $page_CTA2_button; ?>" type="text" class="form-control" name="page_CTA2_button">
</div>

<div class="form-group">
  <label for="page_CTA2_link">CTA 2 Link</label>
  <input value="<?php echo $page_CTA2_link; ?>" type="text" class="form-control" name="page_CTA2_link">
</div> -->