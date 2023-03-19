<!-- Footer-->
<footer class="position-relative z-index-10 d-print-none">
      <!-- Main block - menus, subscribe form-->
      <div class="py-6 bg-gray-200 text-muted"> 
        <div class="container">
          <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
              <div class="fw-bold text-uppercase text-dark mb-3">About <?php echo $title ?></div>
              <p><?php echo $meta_description ?></p>
              <ul class="list-inline">
                <li class="list-inline-item"><a class="text-muted text-primary-hover" href="#" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a class="text-muted text-primary-hover" href="#" target="_blank" title="facebook"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a class="text-muted text-primary-hover" href="#" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a></li>
                <!-- <li class="list-inline-item"><a class="text-muted text-primary-hover" href="#" target="_blank" title="pinterest"><i class="fab fa-pinterest"></i></a></li>
                <li class="list-inline-item"><a class="text-muted text-primary-hover" href="#" target="_blank" title="vimeo"><i class="fab fa-vimeo"></i></a></li> -->
              </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 mb-lg-0">
              <h6 class="text-uppercase text-dark mb-3">Navigation</h6>
              <ul class="list-unstyled">
                <?php
                $query = "SELECT * FROM pages ORDER BY page_order_number";
                $select_all_pages_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_all_pages_query)) {
                  $page_id = $row['page_id'];
                  $page_order_number = $row['page_order_number'];
                  $page_slug = $row['page_slug'];
                  $page_footer_nav_title = $row['page_footer_nav_title'];
                  $page_template = $row['page_template'];
                  $page_status = $row['page_status'];

                  if ($page_status == 'published' && !empty($page_footer_nav_title) && $page_template == 'Home') { ?>
                    <li><a class="text-muted" href="<?php echo $root_url . '/' . $root_folder ?>"><?php echo $page_footer_nav_title; ?></a></li>
                  <?php } elseif ($page_status == 'published' && !empty($page_footer_nav_title) && $page_template == 'Book') { ?>
                    <li class="mt-2 mb-2"><a class="text-muted" href="<?php echo $root_url . '/' . $root_folder ?><?php echo $page_slug; ?>"><?php echo $page_footer_nav_title; ?></a></li>
                  <?php } elseif ($page_status == 'published' && !empty($page_footer_nav_title)) { ?>
                    <li><a class="text-muted" href="<?php echo $root_url . '/' . $root_folder ?><?php echo $page_slug; ?>"><?php echo $page_footer_nav_title; ?></a></li>
                  <?php }
                }
                ?>
              </ul>
            </div>
            
            <div class="col-lg-2">
              <h6 class="text-uppercase text-dark mb-3">Contact Us</h6>
                <?php
                $query = "SELECT * FROM settings ";
                $select_settings_query = mysqli_query($connection, $query);  

                while($row = mysqli_fetch_assoc($select_settings_query)) {
                    $title = $row['title'];
                    $public_contact_email = $row['public_contact_email'];
                    $contact_phone = $row['contact_phone'];
                    $contact_mobile = $row['contact_mobile'];
                    $address = $row['address'];
                    $facebook = $row['facebook'];
                    $twitter = $row['twitter'];
                    $googlecaptcha_secret_key = $row['googlecaptcha_secret_key'];
                    $map_location = $row['map_location'];
                } 
                ?>
                <p class="mb-3"><?php echo $address ?></p>
                <p class="mb-3">
                  <strong class="has-text-white">Phone:</strong> <?php echo $contact_phone; ?><br>
                  <strong class="has-text-white">Mobile:</strong> <?php echo $contact_mobile; ?>
                </p>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
              <iframe src="<?php echo $map_location ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" id="maps"></iframe>
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright section of the footer-->
      <div class="py-4 fw-light bg-gray-800 text-gray-300">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-8 text-center text-md-start">
              <p class="text-sm mb-md-0">&copy; <?php echo date("Y"); ?> <?php echo $title ?> - All rights reserved | Website powered by <a href="https://hotera-cms.com" class="footer-a" target="_blank">Hotera CMS</a></p>
            </div>
            <!-- <div class="col-md-4">
              <ul class="list-inline mb-0 mt-2 mt-md-0 text-center text-md-end">
                <li class="list-inline-item"><img class="w-2rem" src="img/visa.svg" alt="..."></li>
                <li class="list-inline-item"><img class="w-2rem" src="img/mastercard.svg" alt="..."></li>
                <li class="list-inline-item"><img class="w-2rem" src="img/paypal.svg" alt="..."></li>
                <li class="list-inline-item"><img class="w-2rem" src="img/western-union.svg" alt="..."></li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
    </footer>
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
    <!-- Available tile layers-->
    <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/js/map-layers.js"> </script>
    <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/js/map-detail.js"></script>
    <script>
      createDetailMap({
          mapId: 'detailMap',
          mapCenter: [40.732346, -74.0014247],
          markerShow: true,
          markerPosition: [40.732346, -74.0014247],
          markerPath: 'img/marker.svg',
      })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-date-range-picker/0.19.0/jquery.daterangepicker.min.js"> </script>
    <script src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name ?>/js/datepicker-detail.js">   </script>
    <script src="https://smartbooking.co.nz/sfxbook/js/iframeResizer.min.js"></script>
    <script>iFrameResize({},"#abodebooking")</script>
    <script src="https://widget.siteminder.com/ibe.min.js"></script>
    <!-- vanillajs-datepicker -->
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker.min.js"></script> -->

    <script>
      const elem = document.getElementById('checkInOutDates');
      const rangepicker = new DateRangePicker(elem, {
        // ...options
        format: "dd-mm-yyyy",
        calendarWeeks: true,
        clearBtn: true,
        weekStart: 1,
      }); 
    </script>
  </body>
</html>