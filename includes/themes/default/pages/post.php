<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?php echo $title ?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on <?php echo $date ?> by <?php echo $author ?> | <?php echo $comment_count ?> comments</div>
                    <!-- Post categories-->
                    <a class='badge bg-secondary text-decoration-none link-light' href='../category?category=<?php echo getCategoryById($category_id)['id'] ?>'><?php echo getCategoryById($category_id)['title'] ?></a>

                    <!-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> -->
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $image ?>" alt="<?php echo $image_alttag ?>" /></figure>
                <!-- Post content-->
                <section class="mb-5">
                  <span class="fs-5 mb-4"><?php echo $content ?></span>
                </section>
            </article>
            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                      <!-- comments-->
                      <div>
                        <h6 class="text-uppercase text-muted mb-4"><?php echo $comment_count ?> comments</h6>

                        <?php 
                        $comments = getApprovedCommentsOfPost($post_id);

                        foreach ($comments as $comment) {
                        ?>
                            <!-- Single comment-->
                            <div class="d-flex mb-4">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold"><?php echo $comment['author'] ?></div>
                                    <div><small class="text-uppercase text-muted"><?php echo $comment['date'] ?></small></div>
                                    <?php echo $comment['content'] ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                      </div>
                      <!-- /comments-->

                      <!-- comment form-->
                      <?php 
                      createComment($post_id);
                      ?>
                      <div>
                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#leaveComment" aria-expanded="false" aria-controls="leaveComment">Leave a comment</button>
                        <div class="collapse" id="leaveComment"> 
                          <div class="mt-4">
                            <h5 class="mb-4">Leave a comment</h5>
                            <form class="form" id="comment-form" method="post" action="">
                              <div class="row">
                                <div class="col-md-6">                           
                                  <div class="mb-4">
                                    <label class="form-label" for="comment_author">Name <span class="required">*</span></label>
                                    <input class="form-control" id="comment_author" name="comment_author" type="text">
                                  </div>
                                </div>
                                <div class="col-md-6">                                              
                                  <div class="mb-4">
                                    <label class="form-label" for="comment_email">Email <span class="required">*</span></label>
                                    <input class="form-control" id="comment_email" name="comment_email" type="text">
                                  </div>
                                </div>
                              </div>
                              <div class="mb-4">
                                <label class="form-label" for="comment_content">Comment <span class="required">*</span></label>
                                <textarea class="form-control" id="comment_content" name="comment_content" rows="4"></textarea>
                              </div>
                              <button class="btn btn-primary" name="create_comment" type="submit"><i class="far fa-comment"></i> Comment</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- /comment form-->

                        <!-- Comment form-->
                        <!-- <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form> -->
                        
                    </div>
                </div>
            </section>
        </div>
        <!-- SIDEBAR -->
        <?php getSidebar() ?>
    </div>
</div>