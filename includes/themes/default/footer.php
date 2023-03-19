<div class="container">
  <footer class="py-5 border-top">
    <div class="row">
      <div class="col-2">
        <h5>About <?php echo getSettings()['title'] ?></h5>
        <p><?php echo getSettings()['meta_description'] ?></p>
      </div>

      <div class="col-2">
        <h5>Navigation</h5>
          <ul class="nav flex-column">
            <?php 
            // echo getFooterNavigation(); 

            $pages = getFooterNavigation();

            foreach ($pages as $page) {
                if ($page['template'] == 'Home') { 
                    echo '<li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="' . getRootURL() . '/' . getRootFolder() . '">' . $page['footer_nav_title'] . '</a></li>';
                } elseif ($page['template'] == 'Book') { 
                    echo '<li class="nav-item mt-2 mb-2"><a class="nav-link p-0 text-muted" href="' . getRootURL() . '/' . getRootFolder() . $page['slug'] . '">' . $page['footer_nav_title'] . '</a></li>';
                } else { 
                    echo '<li class="nav-item mb-2"><a class="nav-link p-0 text-muted" href="' . getRootURL() . '/' . getRootFolder() . $page['slug'] . '">' . $page['footer_nav_title'] . '</a></li>';
                }
            }
            ?>
          </ul>
      </div>

      <div class="col-2">
        <h5>Contact Us</h5>
        <p class="mb-3"><?php echo getSettings()['address']; ?></p>
        <p class="mb-3">
          <strong class="has-text-white">Phone:</strong> <?php echo getSettings()['contact_phone']; ?><br>
          <strong class="has-text-white">Mobile:</strong> <?php echo getSettings()['contact_mobile']; ?>
        </p>
      </div>

      <div class="col-4 offset-1">
        <form>
          <h5>Subscribe to our newsletter</h5>
          <p>Monthly digest of whats new and exciting from us.</p>
          <div class="d-flex w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-primary" type="button">Subscribe</button>
          </div>
        </form>
        <iframe src="<?php echo getSettings()['map_location'] ?>" width="100%" height="250px" style="border:0;" allowfullscreen="" loading="lazy" id="maps"></iframe>
      </div>
    </div>

    <div class="d-flex justify-content-between py-4 my-4 border-top">
      <p>&copy; <?php echo date("Y"); ?> <?php echo getSettings()['title'] ?> - All rights reserved | Website powered by <a href="https://hotera-cms.com" class="footer-a" target="_blank">Hotera CMS</a></p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
      </ul>
    </div>
  </footer>
</div>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<!-- Core theme JS-->
<!-- <script src="js/scripts.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"> </script>

  </body>
</html>