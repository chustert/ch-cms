<?php
if(isset($_GET['p_id'])) {
  $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE id = $the_post_id";
$select_posts_by_id = mysqli_query($connection, $query);  

  while($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $id = $row['id'];
    $category_id = $row['category_id'];
    $title = $row['title'];
    $slug = $row['slug'];
    $content = $row['content'];
    $image = $row['image'];
    $image_alttag = $row['image_alttag'];
    $author = $row['author'];
    $date = $row['date'];
    $tags = $row['tags'];
    $comment_count = $row['comment_count'];
    $status = $row['status'];  
  }

  if(isset($_POST['update_post'])) {
    $category_id = escape($_POST['category']);
    $title = escape($_POST['title']);
    $slug = replaceSymbols($title);
    $content = escape($_POST['content']);

    // $image          = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['image']['name']);
    $image          = preg_replace('/[^A-Za-z0-9\-_.]/', '_', $_FILES['image']['name']);
    $image_temp     = $_FILES['image']['tmp_name'];

    $image_alttag   = isset($_POST['image_alttag'])   ? escape($_POST['image_alttag']) : '';

    $author = escape($_POST['author']);
    $tags = escape($_POST['tags']);
    
    // $room_gallery = escape($_POST['room_gallery']);
    $status = escape($_POST['status']);
    
    move_uploaded_file($image_temp, $_SERVER['DOCUMENT_ROOT'] . "/" . $root_folder . "includes/themes/" . $theme_folder_name . "/images/" . $image);

    if(empty($image)) {
      $query = "SELECT * FROM posts WHERE id = $the_post_id ";
      $select_image = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_array($select_image)) {
        $image = $row['image'];
      }
    }

    $query = "UPDATE posts SET ";
    $query .= "category_id = '{$category_id}', ";
    $query .= "title = '{$title}', ";
    $query .= "slug = '{$slug}', ";
    $query .= "content = '{$content}', ";
    $query .= "image = '{$image}', ";
    $query .= "image_alttag = '{$image_alttag}', ";
    $query .= "author = '{$author}', ";
    $query .= "date = now(), ";
    $query .= "tags = '{$tags}', ";
    $query .= "status = '{$status}' ";
    $query .= "WHERE id = {$the_post_id} ";

    $update_post = mysqli_query($connection, $query);

    confirmQuery($update_post);

    echo "<p class='bg-success'>Post updated: <a href='../post/{$slug}'>View post</a> | <a href='posts.php'>Edit more posts</a></p>";
  }
?>

<h2 style="margin-bottom: 26px;"><small>Edit Post</small></h2>

<form action="" method="post" enctype="multipart/form-data">    
     
     
<?php include "../includes/themes/" . $theme_folder_name . "/admin/posts/edit_post.php"; ?>


</form>