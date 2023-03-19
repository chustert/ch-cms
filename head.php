<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "admin/functions.php"; ?>

<!doctype html>
<html lang="en">
<head>

    <?php

    $root_folder = getRootFolder();
    $root_url = getRootURL();
    $googlecaptcha_site_key = getGoogleRecaptchaSiteKey();
    $googlecaptcha_secret_key = getGoogleRecaptchaSecretKey();

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

    ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $title ?></title>

    <meta name="description" content="<?php echo $meta_description ?>">
    <!-- Add keywords to settings -->
    <meta content="" name="keywords" /> 

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $favicon ?>">
    
    <!-- Google ReCaptcha v3  -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $googlecaptcha_site_key ?>"></script> <!-- Site Key -->
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('<?php echo $googlecaptcha_site_key ?>', { action: 'contactus' }).then(function (token) { // Site Key
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>

    <?php include "includes/themes/" . $theme_folder_name . "/custom_head.php"; ?>    

    <!-- Google Analytics Code or anything else in the header -->
    <?php echo $head_tag ?>

</head>

<body>