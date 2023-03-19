<?php

if(isset($_POST['create_page'])) {
  $page_order_number = escape($_POST['page_order_number']);
  $page_nav_title = escape($_POST['page_nav_title']);
  $page_footer_nav_title = escape($_POST['page_footer_nav_title']);
  $page_title = escape($_POST['page_title']);
  $page_slug = replaceSymbols($page_title);
  $page_subtitle = escape($_POST['page_subtitle']);
  $page_hero_image = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['name']);
  $page_hero_image_temp = $_FILES['image']['tmp_name'];
  $page_hero_image_alttag = escape($_POST['page_hero_image_alttag']);
  $page_content_title = escape($_POST['page_content_title']);

  $page_content_subtitle  = isset($_POST['page_content_subtitle'])  ? escape($_POST['page_content_subtitle']) : '';
  $page_content           = isset($_POST['page_content'])           ? escape($_POST['page_content']) : '';
  
  $page_content_gallery   = isset($_POST['page_content_gallery'])   ? escape($_POST['page_content_gallery']) : '';
  $page_content2_title    = isset($_POST['page_content2_title'])    ? escape($_POST['page_content2_title']) : '';
  $page_content2_subtitle = isset($_POST['page_content2_subtitle']) ? escape($_POST['page_content2_subtitle']) : '';
  $page_content2          = isset($_POST['page_content2'])          ? escape($_POST['page_content2']) : '';
  $page_content2_gallery  = isset($_POST['page_content2_gallery'])  ? escape($_POST['page_content2_gallery']) : '';
  $page_content3_title    = isset($_POST['page_content3_title'])    ? escape($_POST['page_content3_title']) : '';
  $page_content3_subtitle = isset($_POST['page_content3_subtitle']) ? escape($_POST['page_content3_subtitle']) : '';
  $page_content3          = isset($_POST['page_content3'])          ? escape($_POST['page_content3']) : '';
  $page_content3_gallery  = isset($_POST['page_content3_gallery'])  ? escape($_POST['page_content3_gallery']) : '';
  $page_CTA_title         = isset($_POST['page_CTA_title'])         ? escape($_POST['page_CTA_title']) : '';
  $page_CTA_subtitle      = isset($_POST['page_CTA_subtitle'])      ? escape($_POST['page_CTA_subtitle']) : '';
  $page_CTA_content       = isset($_POST['page_CTA_content'])       ? escape($_POST['page_CTA_content']) : '';
  $page_CTA_button        = isset($_POST['page_CTA_button'])        ? escape($_POST['page_CTA_button']) : '';
  $page_CTA_link          = isset($_POST['page_CTA_link'])          ? escape($_POST['page_CTA_link']) : '';
  $page_CTA2_title        = isset($_POST['page_CTA2_title'])        ? escape($_POST['page_CTA2_title']) : '';
  $page_CTA2_subtitle     = isset($_POST['page_CTA2_subtitle'])     ? escape($_POST['page_CTA2_subtitle']) : '';
  $page_CTA2_content      = isset($_POST['page_CTA2_content'])      ? escape($_POST['page_CTA2_content']) : '';
  $page_CTA2_button       = isset($_POST['page_CTA2_button'])       ? escape($_POST['page_CTA2_button']) : '';
  $page_CTA2_link         = isset($_POST['page_CTA2_link'])         ? escape($_POST['page_CTA2_link']) : '';
  $section_title          = isset($_POST['section_title'])          ? escape($_POST['section_title']) : '';
  $section_subtitle       = isset($_POST['section_subtitle'])       ? escape($_POST['section_subtitle']) : '';
  $section_content        = isset($_POST['section_content'])        ? escape($_POST['section_content']) : '';

  $page_template = escape($_POST['page_template']);
  $page_status = escape($_POST['page_status']);
  
  move_uploaded_file($page_hero_image_temp, $_SERVER['DOCUMENT_ROOT'] . "/" . $root_folder . "includes/themes/" . $theme_folder_name . "/images/" . $page_hero_image);

  $query = "INSERT INTO pages(
    page_order_number, 
    page_slug,
    page_nav_title, 
    page_footer_nav_title, 
    page_title, 
    page_subtitle,
    page_hero_image, 
    page_hero_image_alttag,
    page_content_title,
    page_content_subtitle,
    page_content,
    page_content_gallery,
    page_content2_title,
    page_content2_subtitle,
    page_content2,
    page_content2_gallery,
    page_content3_title,
    page_content3_subtitle,
    page_content3,
    page_content3_gallery,
    page_CTA_title,
    page_CTA_subtitle,
    page_CTA_content,
    page_CTA_button,
    page_CTA_link,
    page_CTA2_title,
    page_CTA2_subtitle,
    page_CTA2_content,
    page_CTA2_button,
    page_CTA2_link,
    section_title,
    section_subtitle,
    section_content,
    page_template, 
    page_status) ";
  $query .= "VALUES(
    $page_order_number, 
    '$page_slug',
    '$page_nav_title', 
    '$page_footer_nav_title', 
    '$page_title', 
    '$page_subtitle', 
    '$page_hero_image', 
    '$page_hero_image_alttag',
    '$page_content_title',
    '$page_content_subtitle',
    '$page_content',
    '$page_content_gallery',
    '$page_content2_title',
    '$page_content2_subtitle',
    '$page_content2',
    '$page_content2_gallery',
    '$page_content3_title',
    '$page_content3_subtitle',
    '$page_content3',
    '$page_content3_gallery',
    '$page_CTA_title',
    '$page_CTA_subtitle',
    '$page_CTA_content',
    '$page_CTA_button',
    '$page_CTA_link', 
    '$page_CTA2_title',
    '$page_CTA2_subtitle',
    '$page_CTA2_content',
    '$page_CTA2_button',
    '$page_CTA2_link',
    '$section_title',
    '$section_subtitle',
    '$section_content', 
    '$page_template', 
    '$page_status')";

  $create_page_query = mysqli_query($connection, $query);

  confirmQuery($create_page_query);

  $the_page_id = mysqli_insert_id($connection);

  echo "<p class='bg-success'>Page added: <a href='../{$page_slug}'>View Page</a> | <a href='pages.php?source=add_page'>Add another page</a></p>";
}

?>

<form action="" method="post" enctype="multipart/form-data">
  <?php
  // Checks if template was selected. If not, show dropdown and submit button
  if (empty($_POST['page_template'])) {
    ?>
    <h2 style="margin-bottom: 26px;"><small>Add Page</small></h2>
    <div class="form-group">
      <label for="page_template">Choose Page Template</label>
      <select name="page_template" class="form-control" style="width: 25%">
        <option value="">Select Option</option>
        <?php
        $query = "SELECT * FROM templates";
        $select_templates = mysqli_query($connection, $query); 

        confirmQuery($select_templates);

        while($row = mysqli_fetch_assoc($select_templates)) {
            $template_id = $row['template_id'];
            $template_name = $row['template_name'];

            if ($template_name != 'Home') {
                echo "<option value='{$template_name}'>{$template_name}</option>";
              }  
        }
        ?>
      </select>
    </div>
    <div class="col-xs-4">
      <input type='submit' name='apply_template' class='btn btn-success' value='Apply'>
    </div>
    <?php  
    // Goes into else-if, if template has been selected; Shows the template that has been selected
    // and the according inputs
  } else if (isset($_POST['apply_template']) && !empty($_POST['page_template'])) {
    $chosen_template_name = escape($_POST['page_template']);
    ?>
    <h2 style="margin-bottom: 26px;"><small>Add "<?php echo $chosen_template_name; ?>" Page</small></h2>
    <div class="form-group">
      <label for="page_template">Page Template</label>
      <select name="page_template" class="form-control" style="width: 25%">
        <option value="<?php echo $chosen_template_name; ?>"><?php echo $chosen_template_name; ?></option>
        <?php
        $query = "SELECT * FROM templates WHERE template_name NOT IN ('$chosen_template_name')";
        $select_templates = mysqli_query($connection, $query); 

        confirmQuery($select_templates);

        while($row = mysqli_fetch_assoc($select_templates)) {
            $template_id = $row['template_id'];
            $template_name = $row['template_name'];  

            echo "<option value='{$template_name}'>{$template_name}</option>";
        }
        ?>
      </select>
    </div>
    <div class="col-xs-4">
      <input type='submit' name='apply_template' class='btn btn-success' value='Apply'>
    </div>

    <div class="form-group">
      <label for="page_order_number">Order Number</label>
      <input type="text" class="form-control" name="page_order_number">
    </div>

    <div class="form-group">
      <label for="page_nav_title">Navigation Title</label>  <a href="#" data-toggle="tooltip" data-placement="top" title="Leave empty to not display in navigation"><i class="fa fa-fw fa-info-circle"></i></a>
      <input type="text" class="form-control" name="page_nav_title">
    </div>

    <div class="form-group">
      <label for="page_footer_nav_title">Footer Navigation Title</label>  <a href="#" data-toggle="tooltip" data-placement="top" title="Leave empty to not display in footer navigation"><i class="fa fa-fw fa-info-circle"></i></a>
      <input type="text" class="form-control" name="page_footer_nav_title">
    </div>

    <div class="form-group">
      <label for="page_title">Title</label>
      <input type="text" class="form-control" name="page_title">
    </div>

    <div class="form-group">
      <label for="page_subtitle">Subtitle</label>
      <input type="text" class="form-control" name="page_subtitle">
    </div>

    <div class="form-group">
       <label for="page_hero_image">Hero Image</label>
       <input type="file" name="image">
    </div>

    <div class="form-group">
      <label for="page_hero_image_alttag">Hero Image Alttag</label>
      <input type="text" class="form-control" name="page_hero_image_alttag">
    </div>

    <div class="form-group">
      <label for="page_content_title">Content Title</label>
      <input type="text" class="form-control" name="page_content_title">
    </div>

    <div class="form-group">
      <label for="page_content_title">Content Subtitle</label>
      <input type="text" class="form-control" name="page_content_subtitle">
    </div>

    <div class="form-group">
      <label for="page_content">Content</label>
      <textarea class="form-control" name="page_content" id="body" cols="30" rows="10"></textarea>
    </div>

    <?php
    switch ($chosen_template_name) {
      case "About":
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/add_about.php"; 
          break;
      case "Posts":
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/add_posts.php";
          break;
      case "Contact":
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/add_contact.php";
          break;
      case "My-Account-Dashboad":
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/my-account/add_dashboard.php";
          break;
      case "My-Account-Profile":
        include "../includes/themes/" . $theme_folder_name . "/admin/pages/my-account/add_profile.php";
        break;
      default:
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/add_default.php";
    }
    ?>

    <div class="form-group">
      <label for="title">Page Status</label>
      <select class="form-control" style="width: 25%" name="page_status">
        <option value="draft">Select Option</option>
        <option value="published">Published</option>
        <option value="draft">Draft</option>
      </select>
    </div>

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_page" value="Submit Page">
    </div>
  <?php } ?>      
</form>