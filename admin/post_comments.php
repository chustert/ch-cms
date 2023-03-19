<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Comments of Post
                        </h1>
                        
                        
                        
                        <form action="" method='post'>
    <table class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Comment</th>
                <th>Email</th>
                <th>In Response to</th>
                <th>Date</th>
                <th>Status</th>
                <th>View post</th>
                <th>Approve</th>
                <th>Unapprove</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php

            $query = "SELECT * FROM comments WHERE post_id = " . mysqli_real_escape_string($connection, $_GET['id']) . " ";
            $select_comments = mysqli_query($connection, $query);  

            while($row = mysqli_fetch_assoc($select_comments)) {
                $id = $row['id'];
                $post_id = $row['post_id'];
                $author = $row['author'];
                $content = $row['content'];
                $email = $row['email'];                
                $status = $row['status'];
                $date = $row['date'];
                
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$author}</td>";
                echo "<td>{$content}</td>";
                echo "<td>{$email}</td>";

                // $query = "SELECT * FROM categories WHERE id = $category_id";
                // $select_categories_id = mysqli_query($connection, $query);  

                // while($row = mysqli_fetch_assoc($select_categories_id)) {
                //     $id = $row['id'];
                //     $title = $row['title'];

                //     echo "<td>{$title}</td>";
                // }
                
                
                $query = "SELECT * FROM posts WHERE id = $post_id ";
                $select_post_id_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_post_id_query)) {
                    $post_id = $row['id'];
                    $post_title = $row['title'];
                    $post_slug = $row['slug'];

                    echo "<td><a href='../post/$post_slug'>$post_title</a></td>";
                }
                
                



                echo "<td>{$date}</td>";
                echo "<td>{$status}</td>";
                echo "<td><a class='btn btn-primary' href='../post/{$post_slug}'>View post</a></td>";
                // echo "<td><a class='btn btn-info' href='posts.php?source=edit_post&p_id={$id}'>Approve</a></td>";
                // echo "<td><a class='btn btn-info' href='posts.php?source=edit_post&p_id={$id}'>Unapprove</a></td>";

                

                ?>
                <!-- DELETE VIA POST BECAUSE MORE SECURE --> 
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <?php  
                    echo '<td><input class="btn btn-success" type="submit" name="approved" value="Approve"></td>';
                    echo '<td><input class="btn btn-warning" type="submit" name="unapproved" value="Unapprove"></td>';
                    echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>';
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

if(isset($_POST['approved'])) {

    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == 'admin') {
            $the_comment_id = $_POST['id'];
            $query = "UPDATE comments SET status = 'approved' WHERE id = {$the_comment_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: post_comments.php?id=" . $_GET['id'] . "");
        }
    }
}

if(isset($_POST['unapproved'])) {

    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == 'admin') {
            $the_comment_id = $_POST['id'];
            $query = "UPDATE comments SET status = 'unapproved' WHERE id = {$the_comment_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: post_comments.php?id=" . $_GET['id'] . "");
        }
    }
}

if(isset($_POST['delete'])) {

    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == 'admin') {
            $the_comment_id = $_POST['id'];
            $query = "DELETE FROM comments WHERE id = {$the_comment_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: post_comments.php?id=" . $_GET['id'] . "");
        }
    }
}
?>

</div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>