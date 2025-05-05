<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include 'student_log_con.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50));
    $expiry = date("Y-m-d H:i:s", strtotime('+1 hour'));

    $stmt = $conn->prepare("UPDATE student_users SET reset_token=?, token_expiry=? WHERE email=?");
    $stmt->bind_param("sss", $token, $expiry, $email);
    $stmt->execute();

    $resetLink = "http://localhost/finalYYYYY/students/reset_password.php?token=$token";

    // Send email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'oniyeabdullahi00@gmail.com';        // ✅ Your Gmail
        $mail->Password   = 'hndsbitoaaxtypfl';          // ✅ Gmail App Password
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        #$mail->SMTPDebug = 2;  // Verbose output
        #$mail->Debugoutput = 'html';


        //Recipients
        $mail->setFrom('oniyeabdullahi00@gmail.com', 'Student Disciplinary Portal');
        $mail->addAddress($email);     

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset Your Password';
        $mail->Body    = "Click <a href='$resetLink'>here</a> to reset your password.";

        $mail->send();
        echo "✅ Password reset link sent to your email.";
    } catch (Exception $e) {
        echo "❌ Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
