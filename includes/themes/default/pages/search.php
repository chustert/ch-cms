<?php 
getNavigation();
getHeader();
?>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Nested row for non-featured blog posts-->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php

                    $search_posts = getSearchPosts();

                    if (!empty($search_posts)) {
                        foreach ($search_posts as $search_post) {
                            ?>
                            <div class="col">
                                <div class="card mb-4">
                                    <a href="<?php echo getRootURL() . '/' . getRootFolder() ?>post/<?php echo $search_post['slug']; ?>"><img class="card-img-top" src="<?php echo getRootURL() . '/' . getRootFolder() . 'includes/themes/' . $theme_folder_name . '/images/' . $search_post['image']; ?>" alt="<?php echo $search_post['image_alttag'] ?>" /></a>
                                    <div class="card-body">
                                        <div class="small text-muted"><?php echo $search_post['date'] ?> by <?php echo $search_post['author'] ?></div>
                                        <h2 class="card-title h4"><?php echo $search_post['title'] ?></h2>
                                        <p class="card-text"><?php echo $search_post['content']; ?></p>
                                        <a class="btn btn-primary" href="<?php echo getRootURL() . '/' . getRootFolder() ?>posts/<?php echo $search_post['slug']; ?>">Read more →</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<h1>No result.</h1>";
                    }

                    
                    ?>                
            </div>

            
        </div>
        <!-- SIDEBAR -->
        <?php include "includes/themes/" . $theme_folder_name . "/sidebar.php"; ?>
    </div>
</div>


<?php getFooter(); ?>