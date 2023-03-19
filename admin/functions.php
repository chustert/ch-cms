<?php 

function getRootFolder() {
    return ""; // THIS WILL NEED TO BE CHANGED WHEN LIVE ! ! !
}

function getRootURL() {
    return (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
}

function getGoogleRecaptchaSiteKey() {
    return "6LfQtxUcAAAAAIOpl4B5E9j29A74Jh7vS1IYrklR"; // THIS WILL NEED TO BE CHANGED WHEN LIVE ! ! !
}

function getGoogleRecaptchaSecretKey() {
    return "6LfQtxUcAAAAANpG78Kmci7dArs3l2ze1sxW_RbY"; // THIS WILL NEED TO BE CHANGED WHEN LIVE ! ! !
}

function redirect($location) {
    header("Location:" . $location);
    exit;
}

function ifItIsMethod($method=null) {
    if($_SERVER['REQUEST_METHOD'] === strtoupper($method)) {
        return true;
    }

    return false;
}

function checkIfUserIsLoggedInAndRedirect($redirectLocation=null) {
    if(isUserLoggedIn()) {
        redirect($redirectLocation);
    }

}

function replaceSymbols($var) {
    $symbols = array('\/','\\',':',';','*','?','"','<','>','|','+','-','!','.','#','$','%',',','=','@','[',']','{','}','(',')','^','`','~','_',' ','&');
    $symbols_replacement = array('-','-','-','-','-','','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','and');

    return str_replace($symbols, $symbols_replacement, strtolower($var));
}

function getAmenitiesArray() {
    return array(
        'Free Parking',
        'Parking',
        'Free Wifi',
        'Wifi',
        'Room Service',
        '24-Hour Guest Reception',
        'Complimentary Toiletries',
        'Ample Wall Outlets',
        'Hair Styling Tools',
        'Flexible Checkout',
        'Pool',
        'Mini-fridge',
        'Equipped Kitchen', 
        'Desk for work', 
        'Air conditioning', 
        'Heating', 
        'Complimentary Electronics Chargers',
        'Clothing Iron',
        'Business Facilities',
        'Transportation Information',
        'Free Breakfast',
        'Breakfast',
        'Laundry Services',
        'Spa & Wellness Amenities',
        'Exercise Facilities and Accessories',
        'Entertainment/TV',
        'Complimentary Luggage storage',
        'Cribs & Cots for Children',
        'Curated Experiences',
        'Bathrobes',
        'Kid-friendly Rooms and Products',
        'Premium Bedding',
        'Bedding',
        'Pet-friendly',
        'Champagne Bar',
        'Washing Machine'
    );
}

function getAmenitiesIconsArray() {
    return array(
        'parking',
        'parking',
        'wifi', 
        'wifi', 
        'bell', // room service
        'clock',
        'bath',
        'plug',
        'cut', // Hair styling tools
        'sign-out-alt', // Flexible checkout
        'swimming-pool',
        'snowflake',
        'utensils',
        'laptop', 
        'thermometer-empty',
        'thermometer-three-quarters', 
        'battery-three-quarters',
        'tshirt', // Clothing iron
        'briefcase',
        'info-circle',
        'coffee',
        'coffee',
        'socks',
        'spa',
        'dumbbell',
        'tv', 
        'archive',
        'baby-carriage',
        'hiking',
        'bath', 
        'puzzle-piece',
        'bed',
        'bed',
        'dog',
        'glass-cheers',
        'tshirt'
    );
}

function confirmQuery($result) {

    global $connection;

    if(!$result) {
    die("QUERY FAILED" . mysqli_error($connection));
  }
}

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

function insertCategories() {

	global $connection;

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];

        if($title == "" || empty($title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(title) ";
            $query .= "VALUE('{$title}') ";

            $create_category_query = mysqli_query($connection, $query);

            confirmQuery($create_category_query);
        }
    } 

}

function findAllCategories() {

	global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);  

    while($row = mysqli_fetch_assoc($select_categories)) {
        $id = $row['id'];
        $title = $row['title'];
        echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$title}</td>";
            echo "<td><a class='btn btn-info' href='categories.php?edit={$id}'>Edit</a></td>";
            ?>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <?php  
                echo '<td><input class="btn btn-danger" type="submit" name="delete" value="Delete"></td>'
                ?>
                
            </form>
            <?php
        echo "</tr>";
    }

}

function updateAndIncludeCategories() {

	global $connection;

    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];

        include "includes/update_categories.php";
    }

}

function deleteCategories() {

	global $connection;

    if(isset($_POST['delete'])) {
        if (isset($_SESSION['user_role'])) {
            if ($_SESSION['user_role'] == 'admin') {
                $the_cat_id = $_POST['id'];
                $query = "DELETE FROM categories WHERE id = {$the_cat_id} ";
                $delete_query = mysqli_query($connection, $query);
                header("Location: categories.php");
            }
        }
    }
}


// CHECK IF USER IS ADMIN
function is_admin($username = '') {
    global $connection;

    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    $row = mysqli_fetch_array($result);

    if ($row['user_role'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

function username_exists($username) {
    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        false;
    }
}

function email_exists($user_email) {
    global $connection;

    $query = "SELECT user_email FROM users WHERE user_email = '$user_email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        false;
    }
}

function register_user($username, $email, $password) {
    global $connection;

    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "INSERT INTO users (username, user_password, user_email, user_role) ";
    $query .= "VALUES('{$username}', '{$password}', '{$email}', 'subscriber' )";
    $register_user_query = mysqli_query($connection, $query);
    
    confirmQuery($register_user_query);
    
}

function login_user($username, $password) {

    global $connection;
    
    $username = trim($username);
    $password = trim($password);

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
        die("QUERY FAILED " . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)) {
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
        $db_user_email = $row['user_email'];
    }
    
    if (password_verify($password, $db_user_password)) {
        
        if (session_status() === PHP_SESSION_NONE) session_start();

        $_SESSION['username'] = $db_username;
        $_SESSION['user_id'] = $db_user_id;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['user_email'] = $db_user_email;
        
        redirect("../admin");
    } else {
        redirect("../login");
    }
}

function getThemeFolderName() {

    global $connection;

    $query = "SELECT * FROM settings ";
    $select_settings_query = mysqli_query($connection, $query);  

    while($row = mysqli_fetch_assoc($select_settings_query)) {
        return $theme_folder_name = $row['theme_folder_name'];
    } 
}

function countNumHomepages() {

    global $connection;
    global $num_homepages;

    $count_num_homepages_query = "SELECT * FROM pages WHERE page_template = 'Home' ";
    $num_homepages_query = mysqli_query($connection, $count_num_homepages_query);

    $num_homepages = mysqli_num_rows($num_homepages_query);

    return $num_homepages;
}



// 
// GET INCLUDES
// 

function getLogoImage() {

    global $connection;

    $query = "SELECT * FROM settings ";
    $select_settings_query = mysqli_query($connection, $query);  

    while($row = mysqli_fetch_assoc($select_settings_query)) {
        $title = $row['title'];
        $logo = $row['logo'];
        $favicon = $row['favicon'];
        $theme_folder_name = $row['theme_folder_name'];
        $meta_description = $row['meta_description'];
        $head_tag = $row['head_tag'];
        $public_contact_email = $row['public_contact_email'];
        $contact_phone = $row['contact_phone'];
    } 

    return "../../includes/themes/" . getThemeFolderName() . "/images/" . $logo;
}

function getHeader() {
    $page_data = getPageData();

    if(!empty($page_data)) {
        extract($page_data);

        // include getRootURL() . "/" . getRootFolder() . "includes/themes/" . getThemeFolderName() . "/header.php";
        include __DIR__ . "../../includes/themes/" . getThemeFolderName() . "/header.php";
    }
}

function getNavigation() {
    // include getRootURL() . "/" . getRootFolder() . "includes/themes/" . getThemeFolderName() . "/header.php";
    include __DIR__ . "../../includes/themes/" . getThemeFolderName() . "/navigation.php";
}

function getFooter() {
    // include getRootURL() . "/" . getRootFolder() . "includes/themes/" . getThemeFolderName() . "/header.php";
    include __DIR__ . "../../includes/themes/" . getThemeFolderName() . "/footer.php";
}

function getSidebar() {
    // include getRootURL() . "/" . getRootFolder() . "includes/themes/" . getThemeFolderName() . "/header.php";
    include __DIR__ . "../../includes/themes/" . getThemeFolderName() . "/sidebar.php";
}

function getPageData() {
    global $connection;

    if(isset($_GET['pg_slug'])) {
        $the_page_slug = $_GET['pg_slug'];

        $query = "SELECT * FROM pages WHERE page_slug = '$the_page_slug' AND page_status = 'published'";
        $select_all_pages_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_pages_query)) {
            $page_data = array(
                'page_order_number' => $row['page_order_number'],
                'page_slug' => $row['page_slug'],
                'page_nav_title' => $row['page_nav_title'],
                'page_footer_nav_title' => $row['page_footer_nav_title'],
                'page_title' => $row['page_title'],
                'page_subtitle' => $row['page_subtitle'],
                'page_hero_image' => $row['page_hero_image'],
                'page_hero_image_alttag' => $row['page_hero_image_alttag'],
                'page_content_title' => $row['page_content_title'],
                'page_content_subtitle' => $row['page_content_subtitle'],
                'page_content' => $row['page_content'],
                'page_content_gallery' => $row['page_content_gallery'],
                'page_content2_title' => $row['page_content2_title'],
                'page_content2_subtitle' => $row['page_content2_subtitle'],
                'page_content2' => $row['page_content2'],
                'page_content2_gallery' => $row['page_content2_gallery'],
                'page_content3_title' => $row['page_content3_title'],
                'page_content3_subtitle' => $row['page_content3_subtitle'],
                'page_content3' => $row['page_content3'],
                'page_content3_gallery' => $row['page_content3_gallery'],
                'page_CTA_title' => $row['page_CTA_title'],
                'page_CTA_subtitle' => $row['page_CTA_subtitle'],
                'page_CTA_content' => $row['page_CTA_content'],
                'page_CTA_button' => $row['page_CTA_button'],
                'page_CTA_link' => $row['page_CTA_link'],
                'page_CTA2_title' => $row['page_CTA2_title'],
                'page_CTA2_subtitle' => $row['page_CTA2_subtitle'],
                'page_CTA2_content' => $row['page_CTA2_content'],
                'page_CTA2_button' => $row['page_CTA2_button'],
                'page_CTA2_link' => $row['page_CTA2_link'],
                'page_template' => $row['page_template'],
                'page_status' => $row['page_status']
            );

            return $page_data;
        }
    } else {
        $query = "SELECT * FROM pages WHERE page_template = 'Home' AND page_status = 'published'";
        $select_all_pages_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_pages_query)) {
            $page_data = array(
                'page_order_number' => $row['page_order_number'],
                'page_slug' => $row['page_slug'],
                'page_nav_title' => $row['page_nav_title'],
                'page_footer_nav_title' => $row['page_footer_nav_title'],
                'page_title' => $row['page_title'],
                'page_subtitle' => $row['page_subtitle'],
                'page_hero_image' => $row['page_hero_image'],
                'page_hero_image_alttag' => $row['page_hero_image_alttag'],
                'page_content_title' => $row['page_content_title'],
                'page_content_subtitle' => $row['page_content_subtitle'],
                'page_content' => $row['page_content'],
                'page_content_gallery' => $row['page_content_gallery'],
                'page_content2_title' => $row['page_content2_title'],
                'page_content2_subtitle' => $row['page_content2_subtitle'],
                'page_content2' => $row['page_content2'],
                'page_content2_gallery' => $row['page_content2_gallery'],
                'page_content3_title' => $row['page_content3_title'],
                'page_content3_subtitle' => $row['page_content3_subtitle'],
                'page_content3' => $row['page_content3'],
                'page_content3_gallery' => $row['page_content3_gallery'],
                'page_CTA_title' => $row['page_CTA_title'],
                'page_CTA_subtitle' => $row['page_CTA_subtitle'],
                'page_CTA_content' => $row['page_CTA_content'],
                'page_CTA_button' => $row['page_CTA_button'],
                'page_CTA_link' => $row['page_CTA_link'],
                'page_CTA2_title' => $row['page_CTA2_title'],
                'page_CTA2_subtitle' => $row['page_CTA2_subtitle'],
                'page_CTA2_content' => $row['page_CTA2_content'],
                'page_CTA2_button' => $row['page_CTA2_button'],
                'page_CTA2_link' => $row['page_CTA2_link'],
                'page_template' => $row['page_template'],
                'page_status' => $row['page_status']
            );

            return $page_data;
        }
    
    }
}

function getSettings() {
    global $connection;

    $query = "SELECT * FROM settings ";
    $select_settings_query = mysqli_query($connection, $query);  
  
    while($row = mysqli_fetch_assoc($select_settings_query)) {
      $title = $row['title'];
      $public_contact_email = $row['public_contact_email'];
      $contact_phone = $row['contact_phone'];
      $contact_mobile = $row['contact_mobile'];
      $meta_description = $row['meta_description'];
      $address = $row['address'];
      $facebook = $row['facebook'];
      $twitter = $row['twitter'];
      $googlecaptcha_secret_key = $row['googlecaptcha_secret_key'];
      $map_location = $row['map_location'];
    } 
  
    return array(
      'title' => $title,
      'public_contact_email' => $public_contact_email,
      'contact_phone' => $contact_phone,
      'contact_mobile' => $contact_mobile,
      'meta_description' => $meta_description,
      'address' => $address,
      'facebook' => $facebook,
      'twitter' => $twitter,
      'googlecaptcha_secret_key' => $googlecaptcha_secret_key,
      'map_location' => $map_location
    );
}

function getCategories() {
    global $connection;

    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection, $query);  

    $categories = array();
    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $categories[] = array(
            'id' => $row['id'],
            'title' => $row['title']
        );
    }

    return $categories;
}

function getCategoryById($category_id) {
    global $connection;

    $query = "SELECT * FROM categories WHERE id = $category_id";
    $select_categories_id = mysqli_query($connection, $query);  

    while($row = mysqli_fetch_assoc($select_categories_id)) {
        $id = $row['id'];
        $title = $row['title'];
    }

    return array(
        'id' => $id,
        'title' => $title
    );
}

function getCategoryPosts($post_category_id) {
    global $connection;

    $query = "SELECT * FROM posts WHERE category_id = $post_category_id AND status = 'published'";
    $select_all_posts_query = mysqli_query($connection, $query);

    confirmQuery($select_all_posts_query);

    $posts = array();
    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $posts[] = array(
            'id' => $row['id'],
            'category_id' => $row['category_id'],
            'title' => $row['title'],
            'slug' => $row['slug'],
            'content' => substr($row['content'], 0, 150),
            'image' => $row['image'],
            'image_alttag' => $row['image_alttag'],
            'author' => $row['author'],
            'date' => $row['date'],
            'tags' => $row['tags'],
            'comment_count' => $row['comment_count'],
            'status' => $row['status']
        );
    }
    return $posts;
    
}

function getSearchPosts() {
    global $connection;

    if(isset($_POST['submit'])) {
        $search = $_POST['search'];

        $query = "SELECT * FROM posts WHERE tags LIKE '%$search%' AND status = 'published' ";
        $search_query = mysqli_query($connection, $query);

        confirmQuery($search_query);

        $posts = array();
        while($row = mysqli_fetch_assoc($search_query)) {
            $posts[] = array(
                'id' => $row['id'],
                'category_id' => $row['category_id'],
                'title' => $row['title'],
                'slug' => $row['slug'],
                'content' => substr($row['content'], 0, 150),
                'image' => $row['image'],
                'image_alttag' => $row['image_alttag'],
                'author' => $row['author'],
                'date' => $row['date'],
                'tags' => $row['tags'],
                'comment_count' => $row['comment_count'],
                'status' => $row['status']
            );
        } 
        return $posts;
    }

}


function getFooterNavigation() {
    global $connection;

    $query = "SELECT * FROM pages WHERE page_status = 'published' AND page_footer_nav_title IS NOT NULL AND TRIM(page_footer_nav_title) <> '' ORDER BY page_order_number";
    $select_all_pages_query = mysqli_query($connection, $query);

    $pages = array();
    while($row = mysqli_fetch_assoc($select_all_pages_query)) {
        $pages[] = array(
            'id' => $row['page_id'],
            'slug' => $row['page_slug'],
            'order_number' => $row['page_order_number'],
            'footer_nav_title' => $row['page_footer_nav_title'],
            'template' => $row['page_template'],
            'status' => $row['page_status']
        );
    }

    return $pages;
}

function getHeaderNavigation() {
    global $connection;

    $query = "SELECT * FROM pages WHERE page_status = 'published' AND page_nav_title IS NOT NULL AND TRIM(page_nav_title) <> '' ORDER BY page_order_number";
    $select_all_pages_query = mysqli_query($connection, $query);

    $pages = array();
    while($row = mysqli_fetch_assoc($select_all_pages_query)) {
        $pages[] = array(
            'id' => $row['page_id'],
            'slug' => $row['page_slug'],
            'order_number' => $row['page_order_number'],
            'nav_title' => $row['page_nav_title'],
            'template' => $row['page_template'],
            'status' => $row['page_status']
        );
    }

    return $pages;
}

function getActivePageClass($pageSlug) {
    $activeClass = '';
    $currentPage = basename($_SERVER['PHP_SELF']);
    $homePage = 'index.php';
    
    if (isset($_GET['pg_slug']) && $_GET['pg_slug'] == $pageSlug) {
        $activeClass = 'active';
    } elseif ($currentPage == $homePage && $pageSlug == '') {
        $activeClass = 'active';
    }
    
    return $activeClass;
}

function getFeaturedPost() {
    global $connection;

    $query = "SELECT * FROM posts WHERE status = 'published' LIMIT 1";
    $select_all_posts_query = mysqli_query($connection, $query);

    $posts = array();
    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $posts[] = array(
            'id' => $row['id'],
            'category_id' => $row['category_id'],
            'title' => $row['title'],
            'slug' => $row['slug'],
            'content' => substr($row['content'], 0, 150),
            'image' => $row['image'],
            'image_alttag' => $row['image_alttag'],
            'author' => $row['author'],
            'date' => $row['date'],
            'tags' => $row['tags'],
            'comment_count' => $row['comment_count'],
            'status' => $row['status']
        );
    } 

    return $posts;
}

function getPosts($page_1, $per_page) {
    global $connection;

    $query = "SELECT * FROM posts WHERE status = 'published' LIMIT $page_1,$per_page";
    $select_all_posts_query = mysqli_query($connection, $query);

    $posts = array();
    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $posts[] = array(
            'id' => $row['id'],
            'category_id' => $row['category_id'],
            'title' => $row['title'],
            'slug' => $row['slug'],
            'content' => substr($row['content'], 0, 150),
            'image' => $row['image'],
            'image_alttag' => $row['image_alttag'],
            'author' => $row['author'],
            'date' => $row['date'],
            'tags' => $row['tags'],
            'comment_count' => $row['comment_count'],
            'status' => $row['status']
        );
    } 

    return $posts;
}

function getApprovedCommentsOfPost($post_id) {
    global $connection;

    $query = "SELECT * FROM comments WHERE post_id = $post_id AND status = 'approved' ORDER BY id DESC ";
    $select_comment_query = mysqli_query($connection, $query);  

    $comments = array();
    while($row = mysqli_fetch_assoc($select_comment_query)) {
        $comments[] = array(
            'author' => $row['author'],
            'content' => $row['content'],
            'status' => $row['status'],
            'date' => $row['date']
        );
    }

    return $comments;
}

function getPaginatedPosts($per_page) {
    global $connection;

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "";
    }

    if($page == "" || $page == 1) {
        $page_1 = 0;
    } else {
        $page_1 = ($page * $per_page) - $per_page;
    }

    $post_count_query = "SELECT * FROM posts";
    $find_count = mysqli_query($connection, $post_count_query);
    $count = mysqli_num_rows($find_count);
    $count = ceil($count / $per_page);

    return array(
        'page_1' => $page_1,
        'count' => $count,
        'page' => $page
    );
}

function isUserLoggedIn() {
    if(isset($_SESSION['user_role'])) {
        return true;
    }
    return false;
}

function isUserAdmin() {
    return $_SESSION['user_role'] == 'admin';
}

function isPage() {
    return isset($_GET['pg_slug']);
}

function getCategoryId() {
    if(isset($_GET['category'])) {
        return $post_category_id = $_GET['category'];
    }
}

function createComment($post_id) {
    if(isset($_POST['create_comment'])){
        global $connection;
        
        $the_post_slug = $_GET['p_slug'];

        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];

        $query = "INSERT INTO comments (post_id, author, email, content, status, date)";
        $query .= "VALUES ($post_id, '$comment_author', '$comment_email', '$comment_content', 'unapproved', now())";
        $create_comment_query = mysqli_query($connection, $query);

        confirmQuery($create_comment_query);

        // $query = "UPDATE posts SET comment_count = comment_count + 1 WHERE id = $post_id";
        // $update_comment_count = mysqli_query($connection, $query);
        
        // confirmQuery($update_comment_count);

        redirect("$the_post_slug");
      }
}


?>


