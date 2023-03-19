<div class="form-group">
        <label for="room_title">Title</label>
        <input value="<?php echo $room_title; ?>" type="text" class="form-control" name="room_title">
      </div>

      <div class="form-group">
        <label for="room_subtitle">Subtitle</label>
        <input value="<?php echo $room_subtitle; ?>" type="text" class="form-control" name="room_subtitle">
      </div>

      <div class="form-group">
        <label for="room_price">Price</label>
        <input value="<?php echo $room_price; ?>" type="text" class="form-control" name="room_price">
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="form-group">
            <label for="room_guests">Max. Room Guests</label>
            <select name="room_guests" class="form-control">
                <option value="<?php echo $room_guests; ?>"><?php echo $room_guests; ?></option>
                <?php
                $exclude = array($room_guests);
                for ($x = 1; $x <= 6; $x++) {
                  if(in_array($x, $exclude)) continue;
                  echo "<option value='$x'>$x</option>";
                }
                ?>
            </select>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="form-group">
            <label for="room_bedrooms">Bedrooms</label>
            <select name="room_bedrooms" class="form-control">
                <option value="<?php echo $room_bedrooms; ?>"><?php echo $room_bedrooms; ?></option>
                <?php
                $exclude = array($room_bedrooms);
                for ($x = 1; $x <= 6; $x++) {
                  if(in_array($x, $exclude)) continue;
                  echo "<option value='$x'>$x</option>";
                }
                ?>
            </select>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="form-group">
            <label for="room_beds">Beds</label>
            <select name="room_beds" class="form-control">
                <option value="<?php echo $room_beds; ?>"><?php echo $room_beds; ?></option>
                <?php
                $exclude = array($room_beds);
                for ($x = 1; $x <= 6; $x++) {
                  if(in_array($x, $exclude)) continue;
                  echo "<option value='$x'>$x</option>";
                }
                ?>
            </select>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="form-group">
            <label for="room_baths">Baths</label>
            <select name="room_baths" class="form-control">
                <option value="<?php echo $room_baths; ?>"><?php echo $room_baths; ?></option>
                <?php
                $exclude = array($room_baths);
                for ($x = 0; $x <= 6; $x++) {
                  if(in_array($x, $exclude)) continue;
                  echo "<option value='$x'>$x</option>";
                }
                ?>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="room_amenities">Amenities</label>
        <div class="row">
          <div class="col-sm-10">
            <!-- String to Array with explode() -->
            <!-- Show all possible amenities, and give the ones that were already there checkmarks! -->
            <?php 
            $room_amenities_arr_all = getAmenitiesArray();
            $room_amenities_arr =  explode(",", $room_amenities);
            //print all the value which are in the array
            foreach($room_amenities_arr_all as $a){

              $checked = '';
              if (in_array($a,$room_amenities_arr)) {
              $checked = 'checked';
              }
                echo '<input type="checkbox" name="amenities[]" value="'.$a.'" '.$checked.'> <label>'.$a.'</label> <br>';
            }
            ?>    
          </div>
        </div>
      </div>

      <div class="form-group d-none">
         <label for="room_hero_image">Hero Room Image</label>
         <img src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $room_hero_image; ?>" alt="" width="100" style="display: block;">
         <input type="file" name="hero_image">
      </div>

      <!-- <div class="form-group">
        <label for="room_hero_image_alttag">Hero Room Image Alt-Text</label>
        <input value="<?php echo $room_hero_image_alttag; ?>" type="text" class="form-control" name="room_hero_image_alttag">
      </div> -->

      <div class="form-group">
        <label for="room_short_description">Short Description</label>
        <input value="<?php echo $room_short_description; ?>" type="text" class="form-control" name="room_short_description">
      </div>

      <div class="form-group">
        <label for="room_content_title">Content Title</label>
        <input value="<?php echo $room_content_title; ?>" type="text" class="form-control" name="room_content_title">
      </div>

      <div class="form-group">
        <label for="room_content">Content</label>
        <textarea class="form-control" name="room_content" id="content" cols="30" rows="10"><?php echo $room_content; ?></textarea>
      </div>

      <!-- <div class="form-group">
        <label for="room_content2_title">Content 2 Title</label>
        <input value="<?php echo $room_content2_title; ?>" type="text" class="form-control" name="room_content2_title">
      </div>

      <div class="form-group">
        <label for="room_content2">Content 2</label>
        <textarea class="form-control" name="room_content2" id="content2" cols="30" rows="10"><?php echo $room_content2; ?></textarea>
      </div> -->

      <!-- <div class="form-group">
        <label for="room_roomcode">Room Code</label>
        <input value="<?php echo $room_roomcode; ?>" type="text" class="form-control" name="room_roomcode">
      </div> -->

      <div class="form-group">
         <label for="room_image">Room Image</label>
         <img src="<?php echo $root_url . '/' . $root_folder . 'includes/themes/' . $theme_folder_name . '/images/' . $room_image; ?>" alt="" width="100" style="display: block;">
         <input type="file" name="image">
      </div>

      <div class="form-group">
        <label for="room_image_alttag">Room Image Alt-Text</label>
        <input value="<?php echo $room_image_alttag; ?>" type="text" class="form-control" name="room_image_alttag">
      </div>

      <div class="form-group">
        <label for="room_gallery">Room Gallery</label>
        <select name="room_gallery" id="room_gallery" class="form-control" style="width: 25%">
          <?php

          $query = "SELECT * FROM galleries WHERE id = $room_gallery";
          $select_gallery = mysqli_query($connection, $query); 

          confirmQuery($select_gallery);

          while($row = mysqli_fetch_assoc($select_gallery)) {
              $id = $row['id'];
              $title = $row['title'];  

              echo "<option value='{$id}'>{$title}</option>";
          }
          ?>
          <?php

          $query = "SELECT * FROM galleries";
          $select_galleries = mysqli_query($connection, $query); 

          confirmQuery($select_galleries);

          while($row = mysqli_fetch_assoc($select_galleries)) {
              $id = $row['id'];
              $title = $row['title'];  

              echo "<option value='{$id}'>{$title}</option>";
          }
          ?>
        </select>
      </div>

      <div class="form-group">
         <label for="room_status">Room Status</label>
         <select name="room_status" class="form-control" style="width: 25%">
            <option value="<?php echo $room_status; ?>"><?php echo $room_status; ?></option>
            <?php

            if($room_status == 'published') {
              echo "<option value='draft'>draft</option>";
            } else {
              echo "<option value='published'>publish</option>";
            }

            ?>
         </select>
      </div>
      
      <div class="form-group">
         <input class="btn btn-primary" type="submit" name="update_room" value="Update room">
      </div>