<?php
include "includes/db.php";
include "head.php";
?>

<?php include "includes/themes/" . $theme_folder_name . "/navigation.php"; ?>

<main>

    <?php
    if(isset($_GET['p_slug'])) {
        $the_post_slug = $_GET['p_slug'];

        $query = "SELECT * FROM posts WHERE slug = '$the_post_slug'";
        $select_all_posts_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_all_posts_query)) {
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

            if($status == 'published') {
            ?>

                <?php include "includes/themes/" . $theme_folder_name . "/pages/post.php"; ?>

            <?php } else { ?>

                <section class="qsbsectionWrap qsbReverseSect">
                    <div class="container">
                        <div class="padding-5 bg-light rounded-3">
                            <div class="row align-items-md-stretch">
                                <div class="col-md-12">
                                    <div class="container-fluid py-3">
                                        <h1 class="qsbTitle">This post has not been published.</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php }
        } 
    } else {
        header("Location: index.php");
    }
    ?>

</main>

<?php
include "includes/themes/" . $theme_folder_name . "/footer.php";
?>
