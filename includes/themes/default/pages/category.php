<?php 
getNavigation();
getHeader();
?>

<main>
<!-- Hero Section-->

    <section class="py-6 bg-gray-100">
      <div class="container">
        <div class="text-center">
          <p class="subtitle text-secondary"><?php echo getPageData()['page_content_subtitle'] ?></p>
          <h2 class="mb-4"><?php echo getPageData()['page_content_title'] ?></h2>
          <span class="lead">
          <?php echo getPageData()['page_content'] ?>
      </span>
        </div>
      </div>
    </section>
    <div class="container-fluid py-5 px-lg-5">
      <div class="row">
        <div class="col-lg-12 pt-3">
          <div class="row">


          <?php

          if (getCategoryId()) {
            $category_posts = getCategoryPosts(getCategoryId());

            if (!empty($category_posts)) {
              foreach ($category_posts as $category_post) {
                ?>
                <!-- place item-->
                <div class="col-sm-6 col-xl-4 mb-5 hover-animate" data-marker-id="59c0c8e33b1527bfe2abaf92">
                  <div class="card h-100 border-0 shadow">
                    <div class="card-img-top overflow-hidden gradient-overlay"> <img class="img-fluid" src="<?php echo getRootURL() . '/' . getRootFolder() . 'includes/themes/' . getThemeFolderName() . '/images/' . $category_post['image']; ?>" alt="<?php echo $category_post['image_alttag'] ?>"/><a class="tile-link" href="<?php echo $root_url . '/' . $root_folder ?>post/<?php echo $slug; ?>"></a>
                    </div>
                    <div class="card-body d-flex align-items-center">
                      <div class="w-100">
                        <h6 class="card-title"><a class="text-decoration-none text-dark" href="<?php echo getRootURL() . '/' . getRootFolder() ?>post/<?php echo $category_post['slug']; ?>"><?php echo $category_post['title'] ?></a></h6>
                        <p class="card-text text-muted"><span class="h4 text-primary"><?php echo $category_post['author']; ?></span></p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
            } else {
              echo "<h1>No posts yet.</h1>";
            }
            
          } else {
            ?>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <?php 
                                $categories = getCategories();
                                foreach ($categories as $category) {
                                    echo "<li><a href='category?category={$category['id']}'>{$category['title']}</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
          }


          
          ?>


          <!-- Pagination -->
          <!-- <nav aria-label="Page navigation example">
            <ul class="pagination pagination-template d-flex justify-content-center">
              <li class="page-item"><a class="page-link" href="#"> <i class="fa fa-angle-left"></i></a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#"> <i class="fa fa-angle-right"></i></a></li>
            </ul>
          </nav> -->
          </div>
        </div>
      </div>
    </div>
</main>

<?php getFooter(); ?>