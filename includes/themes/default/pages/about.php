<?php 
// include "includes/themes/" . $theme_folder_name . "/header.php"; 
getNavigation();
getHeader();
?>



<div class="container">
  <div class="row">
    <div class="text-left">
      <p class="subtitle text-secondary"><?php echo getPageData()['page_content_subtitle'] ?></p>
      <h2 class="mb-4"><?php echo getPageData()['page_content_title'] ?></h2>
      <span class="lead">
        <?php echo getPageData()['page_content'] ?>
      </span>
    </div>
    <div class="text-left">
      <p class="subtitle text-secondary"><?php echo getPageData()['page_content2_subtitle'] ?></p>
      <h2 class="mb-4"><?php echo getPageData()['page_content2_title'] ?></h2>
      <span class="lead">
        <?php echo getPageData()['page_content2'] ?>
      </span>
    </div>
  </div>
</div>

<?php 
// include "includes/themes/" . $theme_folder_name . "/footer.php"; 
getFooter();
?>