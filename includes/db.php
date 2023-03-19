<!-- DO NOT INCLUDE THIS FILE WHEN UPLOADING TO COPY-FOLDER -->
<!-- DO NOT INCLUDE THIS FILE WHEN UPLOADING TO COPY-FOLDER -->
<!-- DO NOT INCLUDE THIS FILE WHEN UPLOADING TO COPY-FOLDER -->


<?php ob_start();

// include "db_hotera.php";

// $query = "SELECT * FROM customers WHERE ";
// $select_customer_query = mysqli_query($connection, $query);  

// while($row = mysqli_fetch_assoc($select_customer_query)) {
  
// }

$db['db_host'] = "localhost";
$db['db_user'] = "root";  // When online, is: hoteracm_$subdomain
$db['db_pass'] = "root";  // When online, is: QN6LA]IDqG-m
$db['db_name'] = "chx-cms_db"; // When online, is: hoteracm_$subdomain

foreach($db as $key => $value) {
    
    define(strtoupper($key), $value);
    
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


?>