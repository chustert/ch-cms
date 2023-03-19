<?php

if(isset($_GET['pg_id'])) {
  $the_page_id = $_GET['pg_id'];
}

$query = "SELECT * FROM pages WHERE page_id = $the_page_id";
$select_pages_by_id = mysqli_query($connection, $query);  

while($row = mysqli_fetch_assoc($select_pages_by_id)) {
  $page_id = $row['page_id'];
  $page_slug = $row['page_slug'];
  $page_order_number = $row['page_order_number'];
  $page_nav_title = $row['page_nav_title'];
  $page_footer_nav_title = $row['page_footer_nav_title'];
  $page_title = $row['page_title'];
  $page_subtitle = $row['page_subtitle'];
  $page_hero_image = $row['page_hero_image'];
  $page_hero_image_alttag = $row['page_hero_image_alttag'];
  $page_content_title = $row['page_content_title'];
  $page_content_subtitle = $row['page_content_subtitle'];
  $page_content = $row['page_content'];
  $page_content_gallery = $row['page_content_gallery'];
  $page_content2_title = $row['page_content2_title'];
  $page_content2_subtitle = $row['page_content2_subtitle'];
  $page_content2 = $row['page_content2'];
  $page_content2_gallery = $row['page_content2_gallery'];
  $page_content3_title = $row['page_content3_title'];
  $page_content3_subtitle = $row['page_content3_subtitle'];
  $page_content3 = $row['page_content3'];
  $page_content3_gallery = $row['page_content3_gallery'];
  $page_CTA_title = $row['page_CTA_title'];
  $page_CTA_subtitle = $row['page_CTA_subtitle'];
  $page_CTA_content = $row['page_CTA_content'];
  $page_CTA_button = $row['page_CTA_button'];
  $page_CTA_link = $row['page_CTA_link'];
  $page_CTA2_title = $row['page_CTA2_title'];
  $page_CTA2_subtitle = $row['page_CTA2_subtitle'];
  $page_CTA2_content = $row['page_CTA2_content'];
  $page_CTA2_button = $row['page_CTA2_button'];
  $page_CTA2_link = $row['page_CTA2_link'];
  $section_title = $row['section_title'];
  $section_subtitle = $row['section_subtitle'];
  $section_content = $row['section_content'];
  $page_template = $row['page_template'];
  $page_status = $row['page_status']; 
}

if(isset($_POST['update_page'])) {
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

  if(empty($page_hero_image)) {
    $query = "SELECT * FROM pages WHERE page_id = $the_page_id ";
    $select_image = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_image)) {
      $page_hero_image = $row['page_hero_image'];
    }
  }

  $query = "UPDATE pages SET ";
  $query .= "page_order_number = '{$page_order_number}', ";
  $query .= "page_slug = '{$page_slug}', ";
  $query .= "page_nav_title = '{$page_nav_title}', ";
  $query .= "page_footer_nav_title = '{$page_footer_nav_title}', ";
  $query .= "page_title = '{$page_title}', ";
  $query .= "page_subtitle = '{$page_subtitle}', ";
  $query .= "page_hero_image = '{$page_hero_image}', ";
  $query .= "page_hero_image_alttag = '{$page_hero_image_alttag}', ";
  $query .= "page_content_title = '{$page_content_title}', ";
  $query .= "page_content_subtitle = '{$page_content_subtitle}', ";
  $query .= "page_content = '{$page_content}', ";
  $query .= "page_content_gallery = '{$page_content_gallery}', ";
  $query .= "page_content2_title = '{$page_content2_title}', ";
  $query .= "page_content2_subtitle = '{$page_content2_subtitle}', ";
  $query .= "page_content2 = '{$page_content2}', ";
  $query .= "page_content2_gallery = '{$page_content2_gallery}', ";
  $query .= "page_content3_title = '{$page_content3_title}', ";
  $query .= "page_content3_subtitle = '{$page_content3_subtitle}', ";
  $query .= "page_content3 = '{$page_content3}', ";
  $query .= "page_content3_gallery = '{$page_content3_gallery}', ";
  $query .= "page_CTA_title = '{$page_CTA_title}', ";
  $query .= "page_CTA_subtitle = '{$page_CTA_subtitle}', ";
  $query .= "page_CTA_content = '{$page_CTA_content}', ";
  $query .= "page_CTA_button = '{$page_CTA_button}', ";
  $query .= "page_CTA_link = '{$page_CTA_link}', ";
  $query .= "page_CTA2_title = '{$page_CTA2_title}', ";
  $query .= "page_CTA2_subtitle = '{$page_CTA2_subtitle}', ";
  $query .= "page_CTA2_content = '{$page_CTA2_content}', ";
  $query .= "page_CTA2_button = '{$page_CTA2_button}', ";
  $query .= "page_CTA2_link = '{$page_CTA2_link}', ";
  $query .= "section_title = '{$section_title}', ";
  $query .= "section_subtitle = '{$section_subtitle}', ";
  $query .= "section_content = '{$section_content}', ";
  $query .= "page_template = '{$page_template}', ";
  $query .= "page_status = '{$page_status}' ";
  $query .= "WHERE page_id = {$the_page_id} ";

  $update_page = mysqli_query($connection, $query);

  confirmQuery($update_page);

  if ($page_template == 'Home') {
    echo "<p class='bg-success'>Page updated: <a href='../'>View Page</a> | <a href='pages.php'>Edit more pages</a></p>";
  } else {
    echo "<p class='bg-success'>Page updated: <a href='../{$page_slug}'>View Page</a> | <a href='pages.php'>Edit more pages</a></p>";
  }
}
?>

<h2 style="margin-bottom: 26px;"><small>Edit "<?php echo $page_title; ?>" Page</small></h2>

<form action="" method="post" enctype="multipart/form-data">    

  <div class="form-group">
    <label for="page_template">Page Template</label>
    <select name="page_template" class="form-control" style="width: 25%">
      <option value="<?php echo $page_template; ?>" readonly><?php echo $page_template; ?></option>
      <?php
      // DEACTIVATED SELECTION OF TEMPLATE - New selection of template not possible. Page would have to be deleted, then newly created

      // $query = "SELECT * FROM templates where template_name NOT IN('$page_template')";
      // $select_templates = mysqli_query($connection, $query); 

      // confirmQuery($select_templates);

      // while($row = mysqli_fetch_assoc($select_templates)) {
      //   $template_id= $row['template_id'];
      //   $template_name = $row['template_name'];  

      //   echo "<option value='{$template_name}'>{$template_name}</option>";
      // }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="page_order_number">Order Number</label>
    <input value="<?php echo $page_order_number; ?>" type="text" class="form-control" name="page_order_number">
  </div>

  <div class="form-group">
    <label for="page_nav_title">Navigation Title</label> <a href="#" data-toggle="tooltip" data-placement="top" title="Leave empty to not display in navigation"><i class="fa fa-fw fa-info-circle"></i></a>
    <input value="<?php echo $page_nav_title; ?>" type="text" class="form-control" name="page_nav_title">
  </div>

  <div class="form-group">
    <label for="page_footer_nav_title">Footer Navigation Title</label> <a href="#" data-toggle="tooltip" data-placement="top" title="Leave empty to not display in footer navigation"><i class="fa fa-fw fa-info-circle"></i></a>
    <input value="<?php echo $page_footer_nav_title; ?>" type="text" class="form-control" name="page_footer_nav_title">
  </div>

  <div class="form-group">
    <label for="page_title">Title</label>
    <input value="<?php echo $page_title; ?>" type="text" class="form-control" name="page_title">
  </div>

  <div class="form-group">
    <label for="page_subtitle">Subtitle</label>
    <input value="<?php echo $page_subtitle; ?>" type="text" class="form-control" name="page_subtitle">
  </div>

  <div class="form-group">
   <label for="page_hero_image">Hero Image</label>
   <img src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $page_hero_image; ?>" alt="" width="100" style="display: block;">
   <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="page_hero_image_alttag">Hero Image Alttag</label>
    <input value="<?php echo $page_hero_image_alttag; ?>" type="text" class="form-control" name="page_hero_image_alttag">
  </div>

  <div class="form-group">
    <label for="page_content_title">Content Title</label>
    <input value="<?php echo $page_content_title; ?>" type="text" class="form-control" name="page_content_title">
  </div>

  <div class="form-group">
    <label for="page_content_subtitle">Content Subtitle</label>
    <input value="<?php echo $page_content_subtitle; ?>" type="text" class="form-control" name="page_content_subtitle">
  </div>

  <div class="form-group">
    <label for="page_content">Content</label>
    <textarea class="form-control" name="page_content" id="content" cols="30" rows="10"><?php echo $page_content; ?></textarea>
  </div>

  <?php
    switch ($page_template) {
      case "Home":
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/edit_home.php"; 
          break;
      case "About":
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/edit_about.php"; 
          break;
      case "Accommodation":
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/edit_accommodation.php";
          break;
      case "Activities":
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/edit_activities.php"; 
          break;
      case "Contact":
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/edit_contact.php";
          break;
      case "Book":
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/edit_book.php";
          break;
      default:
          include "../includes/themes/" . $theme_folder_name . "/admin/pages/edit_default.php";
    }
    ?>

    <div class="form-group">
      <label for="page_status">Page Status</label>
      <select name="page_status" class="form-control" style="width: 25%">
        <option value="<?php echo $page_status; ?>"><?php echo $page_status; ?></option>
        <?php
        if($page_status == 'published') {
          echo "<option value='draft'>draft</option>";
        } else {
          echo "<option value='published'>publish</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="update_page" value="Update Page">
    </div>

</form>