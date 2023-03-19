<section class="hero-home">
      <div class="swiper-container hero-slider">
        <div class="swiper-wrapper dark-overlay">
          <div class="swiper-slide" style="background-image:url(<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $page_hero_image ?>)"></div>
        </div>
      </div>
      <div class="container h-100 py-6 py-md-7 text-white z-index-20">
        <div class="row">
          <div class="col-xl-10">
            <div class="text-center text-lg-start">
              <p class="subtitle letter-spacing-4 mb-2 text-secondary text-shadow"><?php echo $page_subtitle ?></p>
              <h1 class="display-3 fw-bold text-shadow"><?php echo $page_title ?></h1>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <section class="py-6 bg-gray-100">
      <div class="container">
        <div class="text-center pb-lg-4">
          <p class="subtitle text-secondary"><?php echo $page_content_subtitle ?></p>
          <h2 class="mb-4"><?php echo $page_content_title ?></h2>
          <span class="lead mb-5">
            <?php echo $page_content ?>
              </span>
        </div>
      </div>
    </section>
    <section class="py-6">
        <?php
        $query = "SELECT * FROM pages WHERE page_template = 'Posts'";
        $select_page_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_page_query)) {
            $section_title = $row['section_title'];
            $section_subtitle = $row['section_subtitle'];
            $section_content = $row['section_content'];
        } ?>
        <div class="container">
            <div class="row mb-5">
              <div class="col-md-8">
                  <p class="subtitle text-primary"><?php echo $section_subtitle ?></p>
                  <h2><?php echo $section_title ?></h2>
                  <h5 class="mt-4">Categories</h5>
                  <ul class="nav nav-pills-custom">
                    <?php 
                    $query = "SELECT * FROM categories";
                    $select_all_categories_query = mysqli_query($connection, $query);  

                    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                      $id = $row['id'];
                      $title = $row['title'];
                      ?><li class="nav-item"><a class="nav-link" href="#"><?php echo $title ?></a></li><?php 
                    }
                    ?>
                  </ul>
              </div>
            </div>
            <!-- Slider main container-->
            <div class="swiper-container swiper-container-mx-negative swiper-init pt-3" data-swiper="{&quot;slidesPerView&quot;:4,&quot;spaceBetween&quot;:20,&quot;loop&quot;:true,&quot;roundLengths&quot;:true,&quot;breakpoints&quot;:{&quot;1200&quot;:{&quot;slidesPerView&quot;:3},&quot;991&quot;:{&quot;slidesPerView&quot;:2},&quot;565&quot;:{&quot;slidesPerView&quot;:1}},&quot;pagination&quot;:{&quot;el&quot;:&quot;.swiper-pagination&quot;,&quot;clickable&quot;:true,&quot;dynamicBullets&quot;:true}}">
                <!-- Additional required wrapper-->
                <div class="swiper-wrapper pb-5">
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
                          <!-- Slides-->
                          <div class="swiper-slide h-auto px-2">
                              <!-- place item-->
                              <div class="w-100 h-100 hover-animate" data-marker-id="59c0c8e33b1527bfe2abaf92">
                                    <div class="card h-100 border-0 shadow">
                                      <div class="card-img-top overflow-hidden gradient-overlay"> <img class="img-fluid" src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $image; ?>" alt="<?php echo $image_alttag ?>"/><a class="tile-link" href="<?php echo $root_url . '/' . $root_folder ?>accommodation/<?php echo $slug; ?>"></a>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                      <div class="w-100">
                                        <h6 class="card-title"><a class="text-decoration-none text-dark" href="<?php echo $root_url . '/' . $root_folder ?>accommodation/<?php echo $room_slug; ?>"><?php echo $title ?></a></h6>
                                        <div class="d-flex card-subtitle mb-3">
                                            <p class="flex-grow-1 mb-0 text-muted text-sm"><?php echo $content; ?></p>
                                        </div>
                                        <p class="card-text text-muted"><span class="h4 text-primary"><?php echo $author ?></span></p>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>

                      <?php } 
                  } ?>              
                </div>
                <!-- If we need pagination-->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>