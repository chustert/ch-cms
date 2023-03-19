<?php

if(isset($_POST['create_post'])) {

  $category_id    = escape($_POST['category_id']);
  $title          = escape($_POST['title']);
  $slug           = replaceSymbols($title);
  $content        = escape($_POST['content']);

  // $image          = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['name']);
  $image          = preg_replace('/[^A-Za-z0-9\-_.]/', '_', $_FILES['image']['name']);
  $image_temp     = $_FILES['image']['tmp_name'];
  $image_alttag   = isset($_POST['image_alttag'])   ? escape($_POST['image_alttag']) : '';

  $author         = escape($_POST['author']);
  $date           = date('d-m-y');
  $tags           = escape($_POST['tags']);
  // $comment_count  = 0;

  $status         = escape($_POST['status']);
  
  move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT'] . "/" . $root_folder . "includes/themes/" . $theme_folder_name . "/images/" . $image);

  $query = "INSERT INTO posts(
    category_id,
    title, 
    slug,
    content,
    image, 
    image_alttag,
    author,
    date,
    tags,
    status) ";
  $query .= "VALUES(
    '$category_id', 
    '$title',
    '$slug',
    '$content',  
    '$image', 
    '$image_alttag',
    '$author',
    now(), 
    '$tags',
    '$status')";

  $create_post_query = mysqli_query($connection, $query);

  confirmQuery($create_post_query);

  $the_post_id = mysqli_insert_id($connection);

  echo "<p class='bg-success'>Post added: <a href='../post/{$slug}'>View Post</a> | <a href='posts.php?source=add_post'>Add another post</a></p>";
}

?>

<h2 style="margin-bottom: 26px;"><small>Add Post</small></h2>

<form action="" method="post" enctype="multipart/form-data">    
     
 <?php include "../includes/themes/" . $theme_folder_name . "/admin/posts/add_post.php"; ?>


</form>