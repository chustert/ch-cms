<?php

if(isset($_GET['gly_id'])) {
  $the_gallery_id = $_GET['gly_id'];
}




 
if(isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $galleryPhotoValue_id) {
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {

            case 'delete':
    
                $query = "DELETE FROM gallery_photos WHERE id = '{$galleryPhotoValue_id}' ";

                $update_to_delete_status = mysqli_query($connection, $query);

                confirmQuery($update_to_delete_status);

                break;

            case 'clone':
    
                $query = "SELECT * FROM gallery_photos WHERE id = '{$galleryPhotoValue_id}' ";

                $select_gallery_photo_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($select_gallery_photo_query)) {
                    $gallery_id = $row['gallery_id'];
                    $title = $row['title'];
                    $alttag = $row['alttag'];
                    $image = $row['image'];
                }

                $query = "INSERT INTO gallery_photos(gallery_id, title, alttag, image) ";
                $query .= "VALUES($gallery_id, '$title', '$alttag', '$image')";

                $copy_query = mysqli_query($connection, $query);

                if(!$copy_query) {
                    die("Query failed" . mysqli_error($connection));
                }

                break;
            
            default:
                # code...
                break;
        }
    }
}

?>

<div class="row">
    <div class="col-lg-12">
        <h3 style="margin-top: 0px; margin-bottom: 35px;">
          <?php  
          $query = "SELECT * FROM galleries WHERE id = $the_gallery_id";
          $select_gallery = mysqli_query($connection, $query);  

          while($row = mysqli_fetch_assoc($select_gallery)) {
              $id = $row['id'];
              $title = $row['title'];

              echo $title;
          }

          ?>
        </h3>

    </div>
</div>

<?php 
$count_num_photos_query = "SELECT * FROM gallery_photos WHERE gallery_id = '$the_gallery_id' ";
$num_photos_query = mysqli_query($connection, $count_num_photos_query);

$num_photos = mysqli_num_rows($num_photos_query);

if ($num_photos == 0) { ?>
    <p> You haven't added any photos to your gallery yet.<br>
    <form action="" method='post'>
        <table class="table table-bordered table-hover">
            <div class="col-xs-4" style="padding-left: 0px;">
            <a href="gallery_photos.php?source=add_gallery_photo&gly_id=<?php echo $the_gallery_id ?>" class="btn btn-primary">Add New Photo</a>
        </div>
        </table>
    </form>
<?php } else {
?>

    <form action="" method='post'>
        <table class="table table-bordered table-hover">
            
            <div id="bulkOptionsContainer" class="col-xs-4">
                <select class="form-control" name="bulk_options" id="">
                    <option value="">Select Options</option>
                    <option value="delete">Delete</option>
                    <option value="clone">Clone</option>
                </select>
            </div>

            <div class="col-xs-4">
                <input type="submit" name="submit" class="btn btn-success" value="Apply" style="margin-right: 10px;"><a href="gallery_photos.php?source=add_gallery_photo&gly_id=<?php echo $the_gallery_id ?>" class="btn btn-primary">Add New Photo</a>
            </div>

            <thead>
                <tr>
                    <th>
                        <input id="selectAllBoxes" type="checkbox" name="">
                    </th>
                    <th>Title</th>
                    <th>Alt-Tag</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $query = "SELECT * FROM gallery_photos WHERE gallery_id = $the_gallery_id ORDER BY id";
                $select_gallery_photos = mysqli_query($connection, $query);  

                while($row = mysqli_fetch_assoc($select_gallery_photos)) {
                    $id = $row['id'];
                    $gallery_id = $row['gallery_id'];
                    $title = $row['title'];
                    $alttag = $row['alttag'];
                    $image = $row['image'];

                    echo "<tr>";
                    ?>
                    <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
                    <?php
                    echo "<td>{$title}</td>";
                    echo "<td>{$alttag}</td>";
                    echo "<td><img src='{$root_url}/{$root_folder}includes/themes/{$theme_folder_name}/images/{$image}' width='100' alt=''</td>";

                    echo "<td><a class='btn btn-info' href='gallery_photos.php?source=edit_gallery_photo&glyph_id={$id}&gly_id={$the_gallery_id}'>Edit</a></td>";

                    ?>
                    <!-- DELETE VIA POST BECAUSE MORE SECURE --> 
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <?php  
                        echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>'
                        ?>
                        
                    </form>

                    <?php


                    //echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='galleries.php?delete={$gallery_id}'>Delete</a></td>";

                    echo "</tr>";
                }

                ?>

            </tbody>
        </table>
    </form>
<?php } ?>

<?php  
if(isset($_POST['delete'])) {

    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == 'admin') {
            $the_gallery_photo_id = $_POST['id'];
            $query = "DELETE FROM gallery_photos WHERE id = {$the_gallery_photo_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: galleries.php?source=edit_gallery&gly_id=$the_gallery_id");
        }
    }
}
?>


