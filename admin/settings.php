<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

    <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Settings
                        </h1>

                        <?php

                        $query = "SELECT * FROM settings ";
                        $select_settings_query = mysqli_query($connection, $query);  

                        while($row = mysqli_fetch_assoc($select_settings_query)) {
                            $title = $row['title'];
                            $logo = $row['logo'];
                            $favicon = $row['favicon'];
                            $theme_folder_name = $row['theme_folder_name'];
                            $booking_engine = $row['booking_engine'];
                            $booking_engine_accommodation_code = $row['booking_engine_accommodation_code'];
                            // $googlecaptcha_site_key = $row['googlecaptcha_site_key'];
                            // $googlecaptcha_secret_key = $row['googlecaptcha_secret_key'];
                            $meta_description = $row['meta_description'];
                            $head_tag = $row['head_tag'];
                            $map_location = $row['map_location'];
                            $contact_email = $row['contact_email'];
                            $public_contact_email = $row['public_contact_email'];
                            $contact_phone = $row['contact_phone'];
                            $contact_mobile = $row['contact_mobile'];
                            $contact_fax = $row['contact_fax'];
                            $address = $row['address'];
                            $facebook = $row['facebook'];
                            $instagram = $row['instagram'];
                            $twitter = $row['twitter'];
                        }


                        if(isset($_POST['update_settings'])) {
                            $title = escape($_POST['title']);
                            $logo = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['logo']['name']);
                            $logo_temp = $_FILES['logo']['tmp_name'];
                            $favicon = preg_replace('((^\.)|\/|(\.$))', '_', $_FILES['favicon']['name']);
                            $favicon_temp = $_FILES['favicon']['tmp_name'];
                            $theme_folder_name = escape($_POST['theme_folder_name']);
                            $booking_engine = escape($_POST['booking_engine']);
                            $booking_engine_accommodation_code = isset($_POST['booking_engine_accommodation_code']) ? escape($_POST['booking_engine_accommodation_code']) : '';
                            // $googlecaptcha_site_key = escape($_POST['googlecaptcha_site_key']);
                            // $googlecaptcha_secret_key = escape($_POST['googlecaptcha_secret_key']);
                            $meta_description = escape($_POST['meta_description']);
                            $head_tag = escape($_POST['head_tag']);
                            $map_location = escape($_POST['map_location']);
                            $contact_email = escape($_POST['contact_email']);
                            $public_contact_email = escape($_POST['public_contact_email']);
                            $contact_phone = escape($_POST['contact_phone']);
                            $contact_mobile = escape($_POST['contact_mobile']);
                            $contact_fax = escape($_POST['contact_fax']);
                            $address = escape($_POST['address']);
                            $facebook = escape($_POST['facebook']);
                            $instagram = escape($_POST['instagram']);
                            $twitter = escape($_POST['twitter']);
                            
                            move_uploaded_file($logo_temp, $_SERVER['DOCUMENT_ROOT'] . "/" . $root_folder . "includes/themes/" . $theme_folder_name . "/images/" . $logo);

                            if(empty($logo)) {
                              $query = "SELECT * FROM settings";
                              $select_image = mysqli_query($connection, $query);

                              while ($row = mysqli_fetch_array($select_image)) {
                                $logo = $row['logo'];
                              }
                            }

                            move_uploaded_file($favicon_temp, $_SERVER['DOCUMENT_ROOT'] . "/" . $root_folder . "includes/themes/" . $theme_folder_name . "/images/" . $favicon);

                            if(empty($favicon)) {
                              $query = "SELECT * FROM settings";
                              $select_image = mysqli_query($connection, $query);

                              while ($row = mysqli_fetch_array($select_image)) {
                                $favicon = $row['favicon'];
                              }
                            }
                            

                            $query = "UPDATE settings SET ";
                            $query .= "title = '{$title}', ";
                            $query .= "favicon = '{$favicon}', ";
                            $query .= "logo = '{$logo}', ";
                            $query .= "theme_folder_name = '{$theme_folder_name}', ";
                            $query .= "booking_engine = '{$booking_engine}', ";
                            $query .= "booking_engine_accommodation_code = '{$booking_engine_accommodation_code}', ";
                            // $query .= "googlecaptcha_site_key = '{$googlecaptcha_site_key}', ";
                            // $query .= "googlecaptcha_secret_key = '{$googlecaptcha_secret_key}', ";
                            $query .= "meta_description = '{$meta_description}', ";
                            $query .= "head_tag = '{$head_tag}', ";
                            $query .= "map_location = '{$map_location}', ";
                            $query .= "contact_email = '{$contact_email}', ";
                            $query .= "public_contact_email = '{$public_contact_email}', ";
                            $query .= "contact_phone = '{$contact_phone}', ";
                            $query .= "contact_mobile = '{$contact_mobile}', ";
                            $query .= "contact_fax = '{$contact_fax}', ";
                            $query .= "address = '{$address}', ";
                            $query .= "facebook = '{$facebook}', ";
                            $query .= "instagram = '{$instagram}', ";
                            $query .= "twitter = '{$twitter}' ";

                            $update_settings = mysqli_query($connection, $query);

                            confirmQuery($update_settings);

                            echo "<p class='bg-success'>Settings updated</p>";
                          }
                        ?>

                        <h2 id="settings-general" style="margin-bottom: 26px;"><small>General</small></h2>

                        <form action="" method="post" enctype="multipart/form-data">    

                            <div class="form-group">
                                <label for="title">Website Title</label>
                                <input value="<?php echo $title; ?>" type="text" class="form-control" name="title">
                            </div>

                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <img src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $logo; ?>" alt="" width="100" style="display: block;">
                                <input type="file" name="logo">
                            </div>

                            <div class="form-group">
                                <label for="favicon">Favicon</label>
                                <img src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $favicon; ?>" alt="" width="100" style="display: block;">
                                <input type="file" name="favicon">
                            </div>

                            <div class="form-group">
                                <label for="theme_folder_name">Theme Folder Name</label>
                                <p><small>Select the template you would like to use.</small></p>
                                <select name='theme_folder_name' class='form-control' style='width: 25%'>
                                    <?php 
                                    $files = array_slice(scandir($_SERVER['DOCUMENT_ROOT'] . "/" . $root_folder . "includes/themes/"), 2);
                                    if ($theme_folder_name === 0 || empty($theme_folder_name)) {
                                        echo "<option value=''>Select Theme</option>";
                                        foreach ($files as $file) {
                                            if($file != ".DS_Store") 
                                                echo "<option value='$file'>$file</option>";
                                        }
                                    } else {
                                        echo "<option value='$theme_folder_name'>$theme_folder_name</option>";
                                        foreach ($files as $file) {
                                            if($file != ".DS_Store" && $file != $theme_folder_name) 
                                                echo "<option value='$file'>$file</option>";
                                        }
                                    } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="booking_engine">Booking Engine</label>
                                <p><small>Hotera CMS currently supports the booking engines from <a href="https://abodebooking.com/features#abode-booking-engine" target="_blank">Abode Booking</a>, <a href="https://www.siteminder.com/hotel-booking-engine/" target="_blank">Siteminder</a> and <a href="https://prenohq.com/" target="_blank">Preno</a>. If you would like to use another booking engine, please <a href="https://hotera-cms.com/#contact" target="_blank">contact us</a>.</small></p>
                                <select name="booking_engine" class="form-control" style="width: 25%">
                                    <?php
                                    $booking_engines = array(
                                        'Abode', //demochris
                                        'Siteminder', //bbdemo
                                        'Preno',
                                        // 'STAAH',
                                        // 'Other'
                                    );

                                    if (empty($booking_engine)) {
                                        echo "<option value=''>Select Booking Engine</option>";
                                        foreach($booking_engines as $item):
                                            echo '<option value="'.$item.'">'.$item.'</option>';
                                        endforeach;
                                    } else {

                                        $query = "SELECT booking_engine FROM settings";
                                        $select_booking_engine = mysqli_query($connection, $query); 

                                        confirmQuery($select_booking_engine);

                                        while($row = mysqli_fetch_assoc($select_booking_engine)) {
                                            $booking_engine = $row['booking_engine'];

                                            echo "<option value='{$booking_engine}'>{$booking_engine}</option>";

                                            $key = array_search($booking_engine, $booking_engines);
                                            
                                            unset($booking_engines[$key]);
                                            
                                            foreach($booking_engines as $item):
                                                echo '<option value="'.$item.'">'.$item.'</option>';
                                            endforeach;
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="booking_engine_accommodation_code">Booking Engine Accommodation Code</label>
                                <?php
                                    if (empty($booking_engine)) {
                                        echo "<input value='' type='text' class='form-control' name='booking_engine_accommodation_code' style='width: 25%' placeholder='Select Booking Engine First' disabled>";
                                    } else {
                                        echo "<input value='$booking_engine_accommodation_code' type='text' class='form-control' name='booking_engine_accommodation_code' style='width: 25%'>";
                                    }
                                ?>
                                
                            </div>

                            <!-- <div class="form-group">
                                <label for="googlecaptcha">Google Captcha</label>
                                <p><small>Site Key</small></p>
                                <input value="<?php /*echo $googlecaptcha_site_key;*/ ?>" type="text" class="form-control" name="googlecaptcha_site_key">
                                <p><small>Secret Key</small></p>
                                <input value="<?php /*echo $googlecaptcha_secret_key;*/ ?>" type="text" class="form-control" name="googlecaptcha_secret_key">
                            </div> -->

                            <h2 id="settings-seo" style="margin-bottom: 26px;"><small>SEO</small></h2>

                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <p><small>HTML attribute that provides a brief summary of a web page. Search engines often display the meta description in search results.</small></p>
                                <input value="<?php echo $meta_description; ?>" type="text" class="form-control" name="meta_description">
                            </div>

                            <div class="form-group">
                                <label for="head_tag">Head Tag Area</label>
                                <p><small>Add anything that needs to be in the Head tag on top of every page. This is a good place to add the Google Analytics code for example.</small></p>
                                <textarea class="form-control" name="head_tag" cols="30" rows="10"><?php echo $head_tag; ?></textarea>
                            </div>

                            <h2 id="settings-contact" style="margin-bottom: 26px;"><small>Contact</small></h2>

                            <div class="form-group">
                                <label for="map_location">Map Location</label>
                                <input value="<?php echo $map_location; ?>" type="text" class="form-control" name="map_location">
                            </div>

                            <div class="form-group">
                                <label for="contact_email">Contact Email</label>
                                <input value="<?php echo $contact_email; ?>" type="email" class="form-control" name="contact_email">
                            </div>

                            <div class="form-group">
                                <label for="public_contact_email">Public Contact Email</label>
                                <input value="<?php echo $public_contact_email; ?>" type="email" class="form-control" name="public_contact_email">
                            </div>

                            <div class="form-group">
                                <label for="contact_phone">Contact Phone</label>
                                <input value="<?php echo $contact_phone; ?>" type="text" class="form-control" name="contact_phone">
                            </div>

                            <div class="form-group">
                                <label for="contact_mobile">Contact Mobile Phone</label>
                                <input value="<?php echo $contact_mobile; ?>" type="text" class="form-control" name="contact_mobile">
                            </div>

                            <div class="form-group">
                                <label for="contact_fax">Contact Fax</label>
                                <input value="<?php echo $contact_fax; ?>" type="text" class="form-control" name="contact_fax">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input value="<?php echo $address; ?>" type="text" class="form-control" name="address">
                            </div>

                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input value="<?php echo $facebook; ?>" type="text" class="form-control" name="facebook">
                            </div>

                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input value="<?php echo $instagram; ?>" type="text" class="form-control" name="instagram">
                            </div>

                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input value="<?php echo $twitter; ?>" type="text" class="form-control" name="twitter">
                            </div>
                              
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_settings" value="Update Settings">
                            </div>


                        </form>

                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php"; ?>
