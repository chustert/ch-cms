<?php
include "includes/db.php";
include "head.php";
?>

<?php

if(isPage()) {
    
            // Select PAGE
            switch (getPageData()['page_template']) {
                case "About":
                    include "includes/themes/" . $theme_folder_name . "/pages/about.php";
                    break;
                case "Posts":
                    // include "includes/themes/" . $theme_folder_name . "/header.php";
                    include "includes/themes/" . $theme_folder_name . "/pages/posts.php";
                    // include "includes/themes/" . $theme_folder_name . "/footer.php";
                    break;
                case "Category":
                    include "includes/themes/" . $theme_folder_name . "/pages/category.php";
                    break;
                case "Contact":
                    include "contact.php";
                    include "includes/themes/" . $theme_folder_name . "/pages/contact.php";
                    break;
                case "Search":
                    include "includes/themes/" . $theme_folder_name . "/pages/search.php";
                    break;
                case "My-Account-Dashboard":
                    include "includes/themes/" . $theme_folder_name . "/pages/my-account/index.php";
                    break;
                case "My-Account-Profile":
                    include "includes/themes/" . $theme_folder_name . "/pages/my-account/profile.php";
                    break;    
                case "Login":
                    include "includes/themes/" . $theme_folder_name . "/pages/login.php";
                    break;  
                case "Registration":
                    include "includes/themes/" . $theme_folder_name . "/pages/registration.php";
                    break;    
                default:
                    include "includes/themes/" . $theme_folder_name . "/pages/default.php";
            }
    
} else {
    header("Location: index.php");
}
?>


