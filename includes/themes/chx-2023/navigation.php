      <!-- Navbar-->
      <nav class="navbar navbar-expand-lg fixed-top shadow navbar-light bg-white">
        <div class="container-fluid">
          <div class="d-flex align-items-center">
            <a class="navbar-brand py-1" href="<?php echo $root_url . '/' . $root_folder ?>"><img src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $logo ?>" alt="Logo"></a>
            
            <!-- Search Form -->
            <?php 
            if (isset($_POST['submit'])) {
              $search = $_POST['search'];
              $query = "SELECT * FROM posts WHERE tags LIKE '%$search%'";
              $search_query = mysqli_query($connection, $query);

              confirmQuery($search_query);

              $count = mysqli_num_rows($search_query);
              if($count== 0) {
                echo "<h1> NO RESULT </h1>";
              } else {
                echo "<h1> RESULT </h1>";
              }
            }

            ?>
            <form class="form-inline d-none d-sm-flex" action="" method="post" id="search">
              <div class="input-label-absolute input-label-absolute-left input-expand ms-lg-2 ms-xl-3"> 
                <!-- <label class="label-absolute" for="search_search"><i class="fa fa-search"></i><span class="sr-only">What are you looking for?</span></label> -->
                <input class="form-control form-control-sm border-0 shadow-0 bg-gray-200" type="text" name="search">
              </div>
              <button class="btn btn-info" name="submit" type="button">Search</button>
            </form>

          </div>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
          <!-- Navbar Collapse -->
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ms-auto">
            <?php
            $query = "SELECT * FROM pages ORDER BY page_order_number";
            $select_all_pages_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_all_pages_query)) {
              $page_id = $row['page_id'];
              $page_slug = $row['page_slug'];
              $page_order_number = $row['page_order_number'];
              $page_nav_title = $row['page_nav_title'];
              $page_template = $row['page_template'];
              $page_status = $row['page_status'];

              $active_page = '';
              $active_home = '';

              $pageName = basename($_SERVER['PHP_SELF']);

              $home = 'index.php';

              // $pageName = basename($_SERVER('PHP_SELF'));

              if (isset($_GET['pg_slug']) && $_GET['pg_slug'] == $page_slug) {
                $active_page = 'active';
              } elseif ($pageName == $home) {
                $active_home = 'active';
              }
              // 
              // If nav item is "HOME"
              //
              if ($page_status == 'published' && !empty($page_nav_title) && $page_template == 'Home') { ?>
                <li class="nav-item">
                  <a class="nav-link <?php echo $active_home ?>" href="<?php echo $root_url . '/' . $root_folder ?>"><?php echo $page_nav_title; ?></a>
                </li>
              <?php 
              // 
              // If nav item is "BOOK"
              // 
              } elseif ($page_status == 'published' && !empty($page_nav_title) && $page_template == 'Book') { ?>
                <li class="nav-item mt-3 mt-lg-0 ms-lg-3 d-xl-inline-block"><a class="btn btn-primary <?php echo $active_page ?>" href="<?php echo $root_url . '/' . $root_folder ?><?php echo $page_slug; ?>"><?php echo $page_nav_title; ?></a></li>
              <?php
              // 
              // If nav item is "Login"
              // 
              } elseif ($page_status == 'published' && !empty($page_nav_title) && $page_template == 'Login') { ?>
                <?php if(!isset($_SESSION['user_role'])): ?>
                  <li class="nav-item mt-3 mt-lg-0 ms-lg-3 d-xl-inline-block"><a class="btn btn-primary <?php echo $active_page ?>" href="<?php echo $root_url . '/' . $root_folder ?><?php echo $page_slug; ?>"><?php echo $page_nav_title; ?></a></li>
                <?php else: ?>
                  <li class="nav-item"><a class="nav-link" href="../includes/logout.php">LOGOUT</a></li>
                <?php endif; ?>
              <?php 
              // 
              // If nav item is "Registration"
              // 
              } elseif ($page_status == 'published' && !empty($page_nav_title) && $page_template == 'Registration') { ?>
                <?php if(!isset($_SESSION['user_role'])): ?>
                  <li class="nav-item mt-3 mt-lg-0 ms-lg-3 d-xl-inline-block"><a class="btn btn-primary <?php echo $active_page ?>" href="<?php echo $root_url . '/' . $root_folder ?><?php echo $page_slug; ?>"><?php echo $page_nav_title; ?></a></li>
                <?php endif; ?>
              <?php
              // 
              // If nav item is "My Account"
              // 
            } elseif ($page_status == 'published' && !empty($page_nav_title) && $page_template == 'My-Account-Dashboard') { ?>
              <?php if(isset($_SESSION['user_role'])): ?>
                <li class="nav-item mt-3 mt-lg-0 ms-lg-3 d-xl-inline-block"><a class="btn btn-primary <?php echo $active_page ?>" href="<?php echo $root_url . '/' . $root_folder ?><?php echo $page_slug; ?>"><?php echo $page_nav_title; ?></a></li>
              <?php endif; ?>
            <?php  
              // 
              // For all other nav items
              //
              } elseif ($page_status == 'published' && !empty($page_nav_title)) {
                ?>
                <li class="nav-item"><a class="nav-link <?php echo $active_page ?>" href="<?php echo $root_url . '/' . $root_folder ?><?php echo $page_slug; ?>"><?php echo $page_nav_title; ?></a></li>
              <?php } 
            }?>              
            </ul>
          </div>
        </div>
      </nav>
      <!-- /Navbar -->