<main>
  <!-- Hero Section-->
  <section class="d-flex align-items-center dark-overlay bg-cover" style="background-image: url(<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $page_hero_image ?>);">
    <div class="container py-6 py-lg-7 text-white overlay-content text-center"> 
      <div class="row">
        <div class="col-xl-10 mx-auto">
          <h1 class="display-3 fw-bold text-shadow"><?php echo $page_title ?></h1>
          <p class="text-lg text-shadow"><?php echo $page_subtitle ?></p>
        </div>
      </div>
    </div>
  </section>
  <section class="py-6">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-10 mx-auto">
          <h2 class="mb-4"><?php echo $page_content_title ?></h2>           
          <span class="lead mb-5"><?php echo $page_content ?></span>
        </div>
      </div>
  </section>
</main>