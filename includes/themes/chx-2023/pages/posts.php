<main>
<!-- Hero Section-->
    <section class="d-flex align-items-center dark-overlay bg-cover" style="background-image: url(<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $page_hero_image ?>);">
      <div class="container py-6 py-lg-7 text-white overlay-content text-center"> 
        <div class="row">
          <div class="col-xl-10 mx-auto">
            <h1 class="display-3 fw-bold text-shadow"><?php echo $page_title ?></h1>
          </div>
        </div>
      </div>
    </section>
    <section class="py-6 bg-gray-100">
      <div class="container">
        <div class="text-center">
          <p class="subtitle text-secondary"><?php echo $page_content_subtitle ?></p>
          <h2 class="mb-4"><?php echo $page_content_title ?></h2>
          <span class="lead">
          <?php echo $page_content ?>
      </span>
        </div>
      </div>
    </section>
    <div class="container-fluid py-5 px-lg-5">
      <div class="row">
        <div class="col-lg-12 pt-3">
          <div class="row">


          <?php
          $query = "SELECT * FROM posts";
          $select_all_posts_query = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($select_all_posts_query)) {
            $id = $row['id'];
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
                  <!-- place item-->
                  <div class="col-sm-6 col-xl-4 mb-5 hover-animate" data-marker-id="59c0c8e33b1527bfe2abaf92">
                    <div class="card h-100 border-0 shadow">
                      <div class="card-img-top overflow-hidden gradient-overlay"> <img class="img-fluid" src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $image; ?>" alt="<?php echo $image_alttag ?>"/><a class="tile-link" href="<?php echo $root_url . '/' . $root_folder ?>posts/<?php echo $slug; ?>"></a>
                      </div>
                      <div class="card-body d-flex align-items-center">
                        <div class="w-100">
                          <h6 class="card-title"><a class="text-decoration-none text-dark" href="<?php echo $root_url . '/' . $root_folder ?>posts/<?php echo $slug; ?>"><?php echo $title ?></a></h6>
                          <p class="card-text text-muted"><span class="h4 text-primary"><?php echo $author; ?></span></p>
                        </div>
                      </div>
                    </div>
                  </div>

              <?php } 
          } ?>


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