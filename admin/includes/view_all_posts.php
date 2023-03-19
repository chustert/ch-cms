<?php  
if(isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $postValue_id) {
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'published':
    
                $query = "UPDATE posts SET ";
                $query .= "status = '{$bulk_options}' ";
                $query .= "WHERE id = '{$postValue_id}' ";

                $update_to_published_status = mysqli_query($connection, $query);

                confirmQuery($update_to_published_status);

                break;

            case 'draft':
    
                $query = "UPDATE posts SET ";
                $query .= "status = '{$bulk_options}' ";
                $query .= "WHERE id = '{$postValue_id}' ";

                $update_to_draft_status = mysqli_query($connection, $query);

                confirmQuery($update_to_draft_status);

                break;

            case 'delete':
    
                $query = "DELETE FROM posts ";
                $query .= "WHERE id = '{$postValue_id}' ";

                $update_to_delete_status = mysqli_query($connection, $query);

                confirmQuery($update_to_delete_status);

                break;

            case 'clone':
    
                $query = "SELECT * FROM posts ";
                $query .= "WHERE id = '{$postValue_id}' ";

                $select_post_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($select_post_query)) {
                    $category_id = $row['category_id'];
                    $title = $row['title'];
                    $slug = $row['slug'];
                    $content = $row['content'];
                    $image = $row['image'];
                    $image_alttag = $row['image_alttag'];
                    $author = $row['author'];
                    $date = $row['date'];
                    $tags = $row['tags'];
                    $comment_count = $row['comment_count'];
                    $status = $row['status'];
                }

                $query = "INSERT INTO posts(category_id, title, slug, content, image, image_alttag, author, date, tags, comment_count, status) ";
                $query .= "VALUES('$category_id', '$title', '$slug', '$content', '$image', '$image_alttag', '$author', '$date', '$tags', '$comment_count', '$status')";

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
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
        </div>

        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply" style="margin-right: 10px;"><a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
        </div>

        <thead>
            <tr>
                <th>
                    <input id="selectAllBoxes" type="checkbox" name="">
                </th>
                <th>Title</th>
                <th>Image</th>
                <th>Category</th>
                <th>Author</th>
                <th>Date</th>
                <th>Comments</th>
                <th>Status</th>
                <th>View post</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $query = "SELECT * FROM posts";
            $select_posts = mysqli_query($connection, $query);  

            while($row = mysqli_fetch_assoc($select_posts)) {
                $post_id = $row['id'];
                $category_id = $row['category_id'];
                $title = $row['title'];
                $slug = $row['slug'];
                $content = $row['content'];
                $image = $row['image'];
                $image_alttag = $row['image_alttag'];
                $author = $row['author'];
                $date = $row['date'];
                $tags = $row['tags'];
                $comment_count = $row['comment_count'];
                $status = $row['status'];

                echo "<tr>";
                ?>
                <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $id; ?>'></td>
                <?php
                echo "<td>{$title}</td>";
                echo "<td><img src='{$root_url}/{$root_folder}/includes/themes/{$theme_folder_name}/images/{$image}' width='100' alt=''</td>";

                $query = "SELECT * FROM categories WHERE id = $category_id";
                $select_categories_id = mysqli_query($connection, $query);  

                while($row = mysqli_fetch_assoc($select_categories_id)) {
                    $id = $row['id'];
                    $title = $row['title'];

                    echo "<td>{$title}</td>";
                }


                echo "<td>{$author}</td>";
                echo "<td>{$date}</td>";

                $query = "SELECT * FROM comments WHERE post_id = $post_id";
                $send_comment_query = mysqli_query($connection, $query);

                $count_comments = mysqli_num_rows($send_comment_query);
                
                if ($count_comments > 0) {
                    $row = mysqli_fetch_array($send_comment_query);
                    $comment_id = $row['id'];
                    echo "<td><a href='post_comments.php?id=$post_id'>{$count_comments}</a></td>";
                } else {
                    echo "<td>0</td>";
                }

                echo "<td>{$status}</td>";

                echo "<td><a class='btn btn-primary' href='../post/{$slug}'>View post</a></td>";
                echo "<td><a class='btn btn-info' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";

                ?>
                <!-- DELETE VIA POST BECAUSE MORE SECURE --> 
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <?php  
                    echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>'
                    ?>
                    
                </form>

                <?php


                //echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='rooms.php?delete={$room_id}'>Delete</a></td>";

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
            $the_post_id = $_POST['id'];
            $query = "DELETE FROM posts WHERE id = {$the_post_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: posts.php");
        }
    }
}
?>