<?php  
if(isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $galleryValue_id) {
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {

            case 'delete':
    
                $query = "DELETE FROM galleries WHERE id = '{$galleryValue_id}' ";

                $update_to_delete_status = mysqli_query($connection, $query);

                confirmQuery($update_to_delete_status);

                $query = "DELETE FROM gallery_photos WHERE gallery_id = '{$galleryValue_id}' ";

                $update_to_delete_status = mysqli_query($connection, $query);

                confirmQuery($update_to_delete_status);

                break;

            case 'clone':
    
                $query = "SELECT * FROM galleries ";
                $query .= "WHERE id = '{$galleryValue_id}' ";

                $select_gallery_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($select_gallery_query)) {
                    $title = $row['gallery_title'];
                }

                $query = "INSERT INTO galleries(title) ";
                $query .= "VALUES('$title')";

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
            <input type="submit" name="submit" class="btn btn-success" value="Apply" style="margin-right: 10px;"><a href="galleries.php?source=add_gallery" class="btn btn-primary">Add New</a>
        </div>

        <thead>
            <tr>
                <th>
                    <input id="selectAllBoxes" type="checkbox" name="">
                </th>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $query = "SELECT * FROM galleries ORDER BY id";
            $select_galleries = mysqli_query($connection, $query);  

            while($row = mysqli_fetch_assoc($select_galleries)) {
                $id = $row['id'];
                $title = $row['title'];

                echo "<tr>";
                ?>
                <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
                <?php
                echo "<td>{$title}</td>";

                echo "<td><a class='btn btn-info' href='galleries.php?source=edit_gallery&gly_id={$id}'>Edit</a></td>";

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

<?php  
if(isset($_POST['delete'])) {

    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == 'admin') {
            $the_gallery_id = $_POST['id'];
            $query = "DELETE FROM galleries WHERE id = {$the_gallery_id} ";
            $delete_query = mysqli_query($connection, $query);
            confirmQuery($delete_query);
            $query = "DELETE FROM gallery_photos WHERE gallery_id = {$the_gallery_id} ";
            $delete_query = mysqli_query($connection, $query);
            confirmQuery($delete_query);
            header("Location: galleries.php");
        }
    }
}
?>