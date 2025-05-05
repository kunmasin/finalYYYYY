<?php
include 'student_log_con.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE student_users SET passwords=?, reset_token=NULL, token_expiry=NULL WHERE reset_token=?");
    $stmt->bind_param("ss", $new_password, $token);
    $stmt->execute();

    echo "Password updated successfully. You can now <a href='student_login.php'>login</a>.";
}
?>
