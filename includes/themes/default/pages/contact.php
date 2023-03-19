<?php 
getNavigation();
getHeader();
?>

<main>
  <section class="py-6">
    <div class="container">       
      <div class="row">
        <div class="col-md-6 text-center text-md-start mb-4 mb-md-0 pr-6">
          <!-- <p class="subtitle text-primary">Give us a message or speak to us directly</p> -->
          <p class="subtitle text-primary"><?php echo getPageData()['page_content_subtitle'] ?></p>
          <h2><?php echo getPageData()['page_content_title'] ?></h2>
          <span class="text-muted"><?php echo getPageData()['page_content'] ?></span>
        </div>
        <div class="col-md-3 text-center text-md-start mb-4 mb-md-0">
          <div class="icon-rounded mb-4 bg-primary-light">
            <svg class="svg-icon w-2rem h-2rem text-primary">
              <use xlink:href="#landline-1"> </use>
            </svg>
          </div>
          <h3 class="h5">Call us</h3>
          <p class="text-muted">
            <strong>Phone</strong> <?php echo getSettings()['contact_phone'] ?><br>
            <strong>Mobile:</strong> <?php echo getSettings()['contact_mobile'] ?>
          </p>
        </div>
        <div class="col-md-3 text-center text-md-start mb-4 mb-md-0">
          <div class="icon-rounded mb-4 bg-primary-light">
            <svg class="svg-icon w-2rem h-2rem text-primary">
              <use xlink:href="#map-location-1"> </use>
            </svg>
          </div>
          <h3 class="h5">Address</h3>
          <p class="text-muted"><?php echo getSettings()['address'] ?></p>
        </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-6 bg-gray-100">
    <div class="container">
      <h2 class="h4 mb-5">Contact form</h2>
      <div class="row">
        <div class="col-md-7 mb-5 mb-md-0">
          <div class="controls">
            
              <form role="form" action="#contactus" method="post" autocomplete="off">
                
                <div class="mb-4">
                  <label class="form-label" for="name">Your name *</label>
                  <input class="form-control" type="text" name="name" id="name" placeholder="Enter your firstname" required="required">
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-4">
                      <label class="form-label" for="email">Your email *</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Enter your email" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-4">
                      <label class="form-label" for="phone">Your phone number *</label>
                      <input class="form-control" type="phone" name="phone" id="phone" placeholder="Enter your phone number" required="required">
                    </div>
                  </div>
                </div>  
                <div class="mb-4">
                  <label class="form-label" for="body">Your message for us *</label>
                  <textarea class="form-control" rows="4" name="body" id="body" placeholder="Enter your message" required="required"></textarea>
                </div>
                <button class="btn btn-outline-primary" type="submit">Send message</button>

              </form>
              <p class="mt-3 google-fine-print">
                This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.
              </p>

          </div>
        </div>
        <div class="col-md-5">
          <div class="ps-lg-4 text-sm">
            <h4><?php echo getPageData()['page_content2_title'] ?></h4>
            <span class="text-muted"><?php echo getPageData()['page_content2'] ?></span>
            <?php
            if (!empty(getSettings()['facebook']) || !empty(getSettings()['instagram']) || !empty(getSettings()['twitter'])) { ?>
              <h4><?php echo getPageData()['page_content3_title'] ?></h4>
            <?php } ?>
              <div class="social">
                <ul class="list-inline">
                  <?php echo !empty(getSettings()['facebook']) ? '<li class="list-inline-item"><a href="' . getSettings()['facebook'] . '" target="_blank">Facebook</a></li>' : ''; ?> 
                  <?php echo !empty(getSettings()['instagram']) ? '<li class="list-inline-item"><a href="' . getSettings()['instagram'] . '" target="_blank">Insta</i></a></li>' : ''; ?> 
                  <?php echo !empty(getSettings()['twitter']) ? '<li class="list-inline-item"><a href="' . getSettings()['twitter'] . '" target="_blank"><i class="fab fa-twitter"></i></a></li>' : ''; ?> 
                  <!-- <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                  <li class="list-inline-item"><a href="#" target="_blank"><i class="fab fa-vimeo"></i></a></li> -->
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-0">
      <iframe src="<?php echo getSettings()['map_location'] ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" id="maps"></iframe>
  </section>
</main>

<?php getFooter(); ?>