<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo getRootURL() . '/' . getRootFolder() ?>"><img src="<?php echo getLogoImage() ?>" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                $pages = getHeaderNavigation();

                foreach ($pages as $page) {

                  $active_page = getActivePageClass($page['slug']);
                  $active_home = getActivePageClass('');

                  // 
                  // If nav item is "HOME"
                  //
                  if ($page['template'] == 'Home') {
                    ?>
                    <li class="nav-item">
                      <a class="nav-link <?php echo $active_home ?>" href="<?php echo getRootURL() . '/' . getRootFolder() ?>"><?php echo $page['nav_title']; ?></a>
                    </li>
                    <?php
                  } 
                  // 
                  // If nav item is "Login"
                  // 
                  elseif ($page['template'] == 'Login') {
                    ?>
                      <?php if(!isUserLoggedIn()): ?>
                        <li class="nav-item">
                          <a class="btn btn-primary <?php echo $active_page ?>" href="<?php echo getRootURL() . '/' . getRootFolder() ?><?php echo $page['slug']; ?>"><?php echo $page['nav_title']; ?></a>
                        </li>
                      <?php else: ?>
                        <li class="nav-item">
                          <a class="nav-link" href="../includes/logout.php">LOGOUT</a>
                        </li>
                      <?php endif; ?>
                    <?php
                  } 
                  // 
                  // If nav item is "Registration"
                  // 
                  elseif ($page['template'] == 'Registration') {
                    ?>
                      <?php if(!isUserLoggedIn()): ?>
                        <li class="nav-item">
                          <a class="btn btn-primary <?php echo $active_page ?>" href="<?php echo getRootURL() . '/' . getRootFolder() ?><?php echo $page['slug']; ?>"><?php echo $page['nav_title']; ?></a>
                        </li>
                      <?php endif; ?>
                    <?php
                  } 
                  // 
                  // If nav item is "My Account"
                  // 
                  elseif ($page['template'] == 'My-Account-Dashboard') { ?>
                    <?php if(isUserLoggedIn()): ?>
                      <li class="nav-item">
                        <a class="btn btn-primary <?php echo $active_page ?>" href="<?php echo getRootURL() . '/' . getRootFolder() ?><?php echo $page['slug']; ?>"><?php echo $page['nav_title']; ?></a>
                      </li>
                    <?php endif; ?>
                  <?php }
                  // 
                  // For all other nav items
                  //
                  else {
                    ?>
                    <li class="nav-item">
                      <a class="nav-link <?php echo $active_page ?>" href="<?php echo getRootURL() . '/' . getRootFolder() ?><?php echo $page['slug']; ?>"><?php echo $page['nav_title']; ?></a>
                    </li>
                  <?php } 
                }
                // 
                // Shows admin nav item if user is admin
                //
                if (isUserLoggedIn() && isUserAdmin()) {
                    ?>
                    <li class="nav-item">
                      <a class="btn btn-primary <?php echo $active_page ?>" href="<?php echo getRootURL() . '/' . getRootFolder() ?>admin">Admin</a>
                    </li>
                    <?php
                } ?>
            </ul>
        </div>
    </div>
</nav>