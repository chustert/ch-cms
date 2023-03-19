<div class="form-group">
  <label for="title">Title</label>
  <input type="text" class="form-control" name="title">
</div>

<div class="form-group">
  <label for="category_id">Category</label>
  <select name="category_id" id="category_id" class="form-control" style="width: 25%">
    <option value="">Select Option</option>
    <?php

    $query = "SELECT * FROM categories";
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
    <input type="file" name="image">
</div>

<div class="form-group">
  <label for="image_alttag">Image Alt-Text</label>
  <input type="text" class="form-control" name="image_alttag">
</div>

<div class="form-group">
  <label for="content">Content</label>
  <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
</div>

<div class="form-group">
  <label for="author">Author</label>
  <input type="text" class="form-control" name="author">
</div>

<!-- DATE -->

<div class="form-group">
  <label for="tags">Tags</label>
  <input type="text" class="form-control" name="tags">
</div>






<div class="form-group">
    <label for="status">Post Status</label>
    <select class="form-control" style="width: 25%" name="status">
      <option value="draft">Select Option</option>
      <option value="published">Published</option>
      <option value="draft">Draft</option>
    </select>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_post" value="Submit Post">
</div>