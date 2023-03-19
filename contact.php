<?php $query = "SELECT * FROM settings ";
$select_settings_query = mysqli_query($connection, $query);  

while($row = mysqli_fetch_assoc($select_settings_query)) {
    $title = $row['title'];
    $public_contact_email = $row['public_contact_email'];
    $contact_phone = $row['contact_phone'];
    $contact_mobile = $row['contact_mobile'];
    $address = $row['address'];
    $facebook = $row['facebook'];
    $instagram = $row['instagram'];
    $twitter = $row['twitter'];
} 
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {

    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_secret = $googlecaptcha_secret_key; // Secret Key
    $recaptcha_response = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned:
    if ($recaptcha->score >= 0.5) {
        if ($_POST['name']!="" && $_POST['email']!="" && $_POST['phone']!="" && $_POST['body']!="") {
            $to         = $public_contact_email;
            $header     = "From: " .trim($_POST['email']);
            $subject    = "New Message from " . $title;
            $body       = "Message: " . trim($_POST['body']) . "\r\n\r\nPhone: " . trim($_POST['phone']);

            mail($to, $subject, $body, $header);
            echo "<p class='alert alert-success'>Thanks for your message. We will get back to you as soon as we can.</p>";
        } else {
            echo "<p class='alert alert-danger'>Please fill out all three fields.</p>";
        }
        
    } else {
        echo "<p class='alert alert-danger'>Something went wrong.</p>";
    }
}
?>