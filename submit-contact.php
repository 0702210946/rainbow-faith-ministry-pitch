use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path_to/PHPMailer/src/Exception.php';
require 'path_to/PHPMailer/src/PHPMailer.php';
require 'path_to/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                  // Disable debug output
    $mail->isSMTP();                                       // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                  // Specify main SMTP server
    $mail->SMTPAuth   = true;                              // Enable SMTP authentication
    $mail->Username   = 'kenyanzap08@gmail.com';            // Your Gmail address
    $mail->Password   = '543713';               // Gmail app password
    $mail->SMTPSecure = 'tls';                             // Enable TLS encryption
    $mail->Port       = 587;                               // TCP port to connect to

    //Recipients
    $mail->setFrom('kenyanzap08@gmail.com', 'Rainbow Faith Ministry');
    $mail->addAddress('jonienzomba7@gmail.com');            // Add a recipient

    // Content
    $mail->isHTML(true);                                   // Set email format to HTML
    $mail->Subject = 'Welcome To Rainbow Faith Ministry';
    $mail->Body    = '$mail->Body = '<h1>Welcome to Rainbow Faith Ministry</h1><p>Thank you for joining us!</p>';
    ';
    $mail->AltBody = '$mail->AltBody = 'Welcome to Rainbow Faith Ministry! Thank you for joining us.';
    ';

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
