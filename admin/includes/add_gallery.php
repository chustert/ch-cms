<?php

if(isset($_POST['create_gallery'])) {

  $title = escape($_POST['title']); //ESCAPE CLEANS DATA AGAINST MSQL INJECTION
  
  if($title == "" || empty($title)) {
            echo "This field should not be empty.";
        } else {
            $query = "INSERT INTO galleries(title) ";
            $query .= "VALUE('{$title}') ";

            $create_gallery_query = mysqli_query($connection, $query);

            confirmQuery($create_gallery_query);

            $the_gallery_id = mysqli_insert_id($connection);

            header("Location: galleries.php?source=edit_gallery&gly_id={$the_gallery_id}");

            //echo "<p class='bg-success'>Gallery added: <a href='galleries.php?source=edit_gallery&gly_id={$the_gallery_id}'>View Gallery</a> | <a href='galleries.php?source=add_gallery'>Add another gallery</a></p>";
        }
}

?>




<form action="" method="post" enctype="multipart/form-data">    
     
      <div class="form-group">
        <label for="title">Gallery Title</label>
        <input type="text" class="form-control" name="title">
      </div>
      
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="create_gallery" value="Create Gallery">
      </div>


</form>
    