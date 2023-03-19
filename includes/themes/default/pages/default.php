<?php 
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
  </div>
</div>


<?php getFooter(); ?>