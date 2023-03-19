<?php  include "db.php"; ?>
<?php include "../admin/functions.php"; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = escape($_POST['username']);
    $email = escape($_POST['email']);
    $password = escape($_POST['password']);

    $error = [
        'username' => '',
        'email' => '',
        'password' => ''
    ];

    if($username == '') {
        $error['username'] = 'Username cannot be empty';
    }

    if (username_exists($username)) {
        $error['username'] = 'Username already exists.';
    }

    if($email == '') {
        $error['email'] = 'E-Mail cannot be empty';
    }

    if (email_exists($email)) {
        $error['email'] = 'E-Mail already exists, <a href="index.php">please log in.</a>';
    }

    if($password == '') {
        $error['password'] = 'Password cannot be empty';
    }

    foreach ($error as $key => $value) {
        if (empty($value)) {

            unset($error[$key]);
            
        }
    }

    if (empty($error)) {
        register_user($username, $email, $password);

        login_user($email, $password);
    }


}
?>