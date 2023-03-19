<section class="hero-home dark-overlay mb-5"><img class="bg-image" src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $image ?>" alt="<?php echo $image_alttag ?>">
      <div class="container py-7">
        <div class="overlay-content text-center text-white">
          <h1 class="display-3 text-serif fw-bold text-shadow mb-0"><?php echo $title ?></h1>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-xl-8 col-lg-10 mx-auto">           
            <p class="py-3 mb-5 text-muted text-center fw-light"><a href=""><img class="avatar p-1 me-2" src="img/avatar/avatar-11.jpg" alt=""></a> Written by <a class="fw-bold" href="#"><?php echo $author ?></a><span class="mx-1">|</span> <?php echo $date ?> in <a class="fw-bold" href="blog.html"><?php echo $category_id ?></a><span class="mx-1">|</span><a class="text-muted" href="#"><?php echo $comment_count ?> comments                </a></p>
            <!-- <p class="lead mb-5">As am hastily invited <strong>settled at limited</strong> civilly fortune me. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. </p> -->
          </div>
        </div>
        <div class="row">
          <div class="col-xl-10 mx-auto"><img class="img-fluid mb-5" src="img/photo/photo-1471189641895-16c58a695bcb.jpg" alt=""></div>
        </div>
        <div class="row">
          <div class="col-xl-8 col-lg-10 mx-auto">                               
            <div class="text-content">
            <?php echo $content ?>
            <!-- comments-->
            <div class="mt-5">
              <h6 class="text-uppercase text-muted mb-4">2 comments</h6>
              <!-- comment-->
              <div class="d-flex mb-4"><img class="avatar avatar-lg p-1 flex-shrink-0 me-4" src="img/avatar/avatar-0.jpg" alt="Julie Alma">
                <div>
                  <h5>Julie Alma</h5>
                  <p class="text-uppercase text-sm text-muted"><i class="far fa-clock"></i> September 23, 2017 at 12:00 am</p>
                  <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                  <p><a class="btn btn-link text-primary" href="#"><i class="fa fa-reply"></i> Reply</a></p>
                </div>
              </div>
              <!-- /comment-->
              <!-- comment-->
              <div class="d-flex mb-4"><img class="avatar avatar-lg p-1 flex-shrink-0 me-4" src="img/avatar/avatar-8.jpg" alt="Louise Armero">
                <div>
                  <h5>Louise Armero</h5>
                  <p class="text-uppercase text-sm text-muted"><i class="far fa-clock"></i> June 23, 2017 at 12:35 pm</p>
                  <p class="text-muted">Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
                  <p><a class="btn btn-link text-primary" href="#"><i class="fa fa-reply"></i> Reply</a></p>
                </div>
              </div>
              <!-- /comment-->
            </div>
            <!-- /comments-->
            <!-- comment form-->
            <div class="mb-5">
              <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#leaveComment" aria-expanded="false" aria-controls="leaveComment">Leave a comment</button>
              <div class="collapse" id="leaveComment"> 
                <div class="mt-4">
                  <h5 class="mb-4">Leave a comment</h5>
                  <form class="form" id="comment-form" method="post" action="#">
                    <div class="row">
                      <div class="col-md-6">                           
                        <div class="mb-4">
                          <label class="form-label" for="name">Name <span class="required">*</span></label>
                          <input class="form-control" id="name" type="text">
                        </div>
                      </div>
                      <div class="col-md-6">                                              
                        <div class="mb-4">
                          <label class="form-label" for="email">Email <span class="required">*</span></label>
                          <input class="form-control" id="email" type="text">
                        </div>
                      </div>
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="comment">Comment <span class="required">*</span></label>
                      <textarea class="form-control" id="comment" rows="4"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit"><i class="far fa-comment"></i> Comment                                   </button>
                  </form>
                </div>
              </div>
            </div>
            <!-- /comment form-->
          </div>
        </div>
      </div>
    </section>