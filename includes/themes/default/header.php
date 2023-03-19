<?php 
// include "navigation.php"; 
?>
<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4" style="background-image:url(<?php echo getRootURL() . '/' . getRootFolder() . 'includes/themes/' . getThemeFolderName() . '/images/' . getPageData()['page_hero_image'] ?>)">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder"><?php echo getPageData()['page_title'] ?></h1>
            <p class="lead mb-0"><?php echo getPageData()['page_subtitle'] ?></p>
        </div>
    </div>
</header>