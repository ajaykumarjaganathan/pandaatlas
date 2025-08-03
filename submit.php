<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';
require 'vendor/PHPMailer/src/Exception.php';


$file = 'C:/laragon/www/hotel/enquiries.csv';

// Sanitize form input
$name = $_POST['name'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$email = $_POST['email'] ?? '';
$checkin_date = $_POST['checkin_date'] ?? '';
$checkin_time = $_POST['checkin_time'] ?? '';
$checkout_date = $_POST['checkout_date'] ?? '';
$checkout_time = $_POST['checkout_time'] ?? '';
$adults = $_POST['adults'] ?? '';
$children = $_POST['children'] ?? '';

// Validate email only if not empty
if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<h2>Invalid Email</h2><p>Please go back and correct it.</p>";
    exit;
}

// Save to CSV
$data = [$name, $mobile, $email, $checkin_date, $checkin_time, $checkout_date, $checkout_time, $adults, $children];
$file_exists = file_exists($file);

if ($fp = fopen($file, 'a')) {
    if (!$file_exists) {
        fputcsv($fp, ['Full Name', 'Mobile', 'Email', 'Check-In Date', 'Check-In Time', 'Check-Out Date', 'Check-Out Time', 'Adults', 'Children']);
    }
    fputcsv($fp, $data);
    fclose($fp);

    // Send email
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ajaykumarimpex833@gmail.com'; // your Gmail
        $mail->Password   = 'wwfn xfww hkxj qptu'; // Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('ajaykumarimpex833@gmail.com', 'Hotel Enquiry');
        $mail->addAddress('ajaykumarimpex833@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "New Hotel Enquiry from $name";
        $mail->Body    = "
            <h3>Enquiry Details</h3>
            <ul>
                <li>Name: $name</li>
                <li>Mobile: $mobile</li>
                <li>Email: $email</li>
                <li>Check-In: $checkin_date $checkin_time</li>
                <li>Check-Out: $checkout_date $checkout_time</li>
                <li>Adults: $adults</li>
                <li>Children: $children</li>
            </ul>";

        $mail->send();
        echo "<h2>Thank you, $name!</h2><p>Your enquiry has been submitted and emailed.</p>";
    } catch (Exception $e) {
        echo "<h2>Mailer Error:</h2><p>{$mail->ErrorInfo}</p>";
    }
} else {
    echo "<h2>Error</h2><p>Could not open CSV for writing.</p>";
}
?>
