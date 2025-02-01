<?php
$to = 'mpoonia1240@example.com'; // Replace with the recipient's email address
$subject = 'Test Email from PHP Mail';
$message = 'This is a test email sent from PHP using Gmail SMTP.';
$headers = 'From: garvgaba.gg@gmail.com' . "\r\n" . // Replace with your email
    'Reply-To: garvgaba.gg@gmail.com' . "\r\n" . // Replace with your email
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
} else {
    echo 'Failed to send email.';
}
?>
