<?php
$query = "SELECT * FROM pages WHERE page_template = 'Home'";
$select_homepage_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_homepage_query)) {
  $page_hero_image = $row['page_hero_image'];
}?>


<div class="mh-full-screen d-flex align-items-center dark-overlay"><img class="bg-image" src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $page_hero_image ?>" alt="Not found">
  <div class="container text-white text-lg overlay-content py-6 py-lg-0">
    <?php
    $error = $_SERVER["REDIRECT_STATUS"];
    $error_title = '';
    $error_type = '';
    $error_message = '';
    $error_suggestion = '';

    if($error == 404) {
      $error_title = 'Oops, that page is not here.';
      $error_type = 'Error 404';
      $error_message = 'The document/file requested was not found on this server.';
      $error_suggestion = 'Start from the Homepage';
    }
    ?>
    <h1 class="display-3 fw-bold mb-5"><?php echo $error_title; ?></h1>
    <p class="fw-light mb-5"><?php echo $error_message; ?></p>
    <p class="mb-6"> <a class="btn btn-outline-light" href="<?php echo $root_url . '/' . $root_folder ?>"><i class="fa fa-home me-2"></i><?php echo $error_suggestion; ?></a></p>
    <p class="h4 text-shadow"><?php echo $error_type; ?></p>
  </div>
</div>
