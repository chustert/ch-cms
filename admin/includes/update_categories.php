<form action="" method="post">
    <div class="form-group">
        <label for="title">Edit Category</label>
        <?php 
        if(isset($_GET['edit'])) {
            $the_cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE id = $the_cat_id";
            $select_categories_id = mysqli_query($connection, $query);  

            while($row = mysqli_fetch_assoc($select_categories_id)) {
                $id = $row['id'];
                $title = $row['title'];
                ?>
                <input value="<?php if(isset($title)){echo $title;} ?>" type="text" class="form-control" name="title">
        <?php }} ?>
        <?php 
        // UPDATE QUERY
        if(isset($_POST['update_category'])) {
            if (isset($_SESSION['user_role'])) {
                if ($_SESSION['user_role'] == 'admin') {
                    $the_cat_title = $_POST['title'];
                    $query = "UPDATE categories SET title = '{$the_cat_title}' WHERE id = {$id} ";
                    $update_query = mysqli_query($connection, $query);
                    header("Location: categories.php");
                }
            }
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>