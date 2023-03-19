<?php 
// include "includes/themes/" . $theme_folder_name . "/header.php"; 
getNavigation();
getHeader();
?>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <?php
            $posts = getFeaturedPost();

            foreach ($posts as $post) {
            ?>
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="<?php echo getRootURL() . '/' . getRootFolder() ?>post/<?php echo $post['slug'] ?>"><img class="card-img-top" src="<?php echo getRootURL() . '/' . getRootFolder() . 'includes/themes/' . getThemeFolderName() . '/images/' . $post['image']; ?>" alt="<?php echo $post['image_alttag'] ?>" /></a>
                    <div class="card-body">
                        <div class="small text-muted"><?php echo $post['date'] ?> by <?php echo $post['author'] ?></div>
                        <h2 class="card-title h4"><?php echo $post['title'] ?></h2>
                        <p class="card-text"><?php echo $post['content']; ?></p>
                        <a class="btn btn-primary" href="<?php echo $root_url . '/' . $root_folder ?>post/<?php echo $post['slug']; ?>">Read more →</a>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- Nested row for non-featured blog posts-->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    $per_page = 2;

                    $pagination_data = getPaginatedPosts($per_page);

                    $page = $pagination_data['page'];
                    $page_1 = $pagination_data['page_1'];
                    $count = $pagination_data['count'];

                    $posts = getPosts($page_1, $per_page);

                    foreach ($posts as $post) {
                    ?>
                        <!-- Featured blog post-->
                        <div class="col">
                            <div class="card mb-4">
                                <a href="<?php echo getRootURL() . '/' . getRootFolder() ?>post/<?php echo $post['slug'] ?>"><img class="card-img-top" src="<?php echo getRootURL() . '/' . getRootFolder() . 'includes/themes/' . getThemeFolderName() . '/images/' . $post['image']; ?>" alt="<?php echo $post['image_alttag'] ?>" /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php echo $post['date'] ?> by <?php echo $post['author'] ?></div>
                                    <h2 class="card-title h4"><?php echo $post['title'] ?></h2>
                                    <p class="card-text"><?php echo $post['content']; ?></p>
                                    <a class="btn btn-primary" href="<?php echo $root_url . '/' . $root_folder ?>post/<?php echo $post['slug']; ?>">Read more →</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>                
            </div>

            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">

                    <?php if ($page > 1): ?>
                        <li class='page-item'><a class='page-link' href='/?page=1'><<</a></li>
                        <li class='page-item'><a class='page-link' href='/?page=<?= $page - 1 ?>'>Newer</a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $count; $i++): ?>
                        <?php if ($page != "" && $i < $page - 4): continue; ?>
                        <?php elseif ($page != "" && $i == $page - 4): ?>
                            <li class='page-item'><a class='page-link' href='/?page=<?= $page - 4 ?>'>...</a></li>
                        <?php elseif ($page != "" && $i > $page + 4): continue; ?>
                        <?php elseif ($page != "" && $i == $page + 4): ?>
                            <li class='page-item'><a class='page-link' href='/?page=<?= $page + 4 ?>'>...</a></li>
                        <?php else: ?>
                            <li class='page-item <?= ($i == $page || ($i == 1 && $page_1 == 0)) ? "active" : "" ?>'
                                aria-current='page'>
                                <a class='page-link' href='/?page=<?= $i ?>'><?= $i ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($page == ""): ?>
                        <li class='page-item'><a class='page-link' href='/?page=2'>Newer</a></li>
                    <?php elseif ($page + 1 <= $count): ?>
                        <li class='page-item'><a class='page-link' href='/?page=<?= $page + 1 ?>'>Older</a></li>
                        <li class='page-item'><a class='page-link' href='/?page=<?= $count ?>'>>></a></li>
                    <?php endif; ?>

                </ul>
            </nav>
        </div>
        <!-- SIDEBAR -->
        <?php 
        // include "includes/themes/" . $theme_folder_name . "/sidebar.php";
        getSidebar();
        ?>
    </div>
</div>

<?php 
// include "includes/themes/" . $theme_folder_name . "/footer.php"; 
getFooter();
?>