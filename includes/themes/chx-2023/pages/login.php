 <body>
    <div class="container-fluid px-3">
      <div class="row min-vh-100">
        <div class="col-md-8 col-lg-6 col-xl-5 d-flex align-items-center">
          <div class="w-100 py-5 px-md-5 px-xxl-6 position-relative">
            <div class="mb-5"><img class="img-fluid mb-3" src="img/logo-square.svg" alt="..." style="max-width: 4rem;">
              <h2>Welcome back</h2>
            </div>
            <form class="form-validate" action="includes/login.php" method="post">
              <div class="mb-4">
                <label class="form-label" for="username"> Username</label>
                <input class="form-control" name="username" id="username" type="text" placeholder="username" autocomplete="off" required data-msg="Please enter your username">
              </div>
              <div class="mb-4">
                <div class="row">
                  <div class="col">
                    <label class="form-label" for="password"> Password</label>
                  </div>
                  <div class="col-auto"><a class="form-text small text-primary" href="#">Forgot password?</a></div>
                </div>
                <input class="form-control" name="password" id="password" placeholder="Password" type="password" required data-msg="Please enter your password">
              </div>
              <div class="mb-4">
                <div class="form-check">
                  <input class="form-check-input" id="loginRemember" type="checkbox">
                  <label class="form-check-label text-muted" for="loginRemember"> <span class="text-sm">Remember me for 30 days</span></label>
                </div>
              </div>
              <!-- Submit-->
              <div class="d-grid">
                <button class="btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
              </div>
              <!-- <hr class="my-3 hr-text letter-spacing-2" data-content="OR">
              <div class="d-grid gap-2">
                <button class="btn btn btn-outline-primary btn-social"><i class="fa-2x fa-facebook-f fab btn-social-icon"> </i>Connect <span class="d-none d-sm-inline">with Facebook</span></button>
                <button class="btn btn btn-outline-muted btn-social"><i class="fa-2x fa-google fab btn-social-icon"> </i>Connect <span class="d-none d-sm-inline">with Google</span></button>
              </div> -->
              <hr class="my-4">
              <p class="text-center"><small class="text-muted text-center">Don't have an account yet? <a href="signup.html">Sign Up                </a></small></p>
            </form><a class="close-absolute me-md-5 me-xl-6 pt-5" href="../"> 
              <svg class="svg-icon w-3rem h-3rem">
                <use xlink:href="#close-1"> </use>
              </svg></a>
          </div>
        </div>
        <div class="col-md-4 col-lg-6 col-xl-7 d-none d-md-block">
          <!-- Image-->
          <div class="bg-cover h-100 me-n3" style="background-image: url(img/photo/photo-1497436072909-60f360e1d4b1.jpg);"></div>
        </div>
      </div>
    </div>
        <!-- JavaScript files-->
        <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }    
      // to avoid CORS issues when viewing using file:// protocol, using the demo URL for the SVG sprite
      // use your own URL in production, please :)
      // https://demo.bootstrapious.com/directory/1-0/icons/orion-svg-sprite.svg
      //- injectSvgSprite('${path}icons/orion-svg-sprite.svg'); 
      injectSvgSprite('https://demo.bootstrapious.com/directory/1-4/icons/orion-svg-sprite.svg'); 
      
    </script>
    <!-- jQuery-->
    <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap JS bundle - Bootstrap + PopperJS-->
    <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Magnific Popup - Lightbox for the gallery-->
    <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Smooth scroll-->
    <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/vendor/smooth-scroll/smooth-scroll.polyfills.min.js"></script>
    <!-- Bootstrap Select-->
    <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <!-- Object Fit Images - Fallback for browsers that don't support object-fit-->
    <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/vendor/object-fit-images/ofi.min.js"></script>
    <!-- Swiper Carousel                       -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script>
    <script>var basePath = '';</script>
    <!-- Main Theme JS file    -->
    <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/js/theme.js"></script>
    <!-- Map-->
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
   <!-- Main Theme JS file    -->
   <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/js/theme.js"></script>

  </body>
</html>