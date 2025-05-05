<?php
include 'student_log_con.php';

$token = $_GET['token'];
$result = $conn->prepare("SELECT * FROM student_users WHERE reset_token=? AND token_expiry > NOW()");
$result->bind_param("s", $token);
$result->execute();
$data = $result->get_result()->fetch_assoc();

if (!$data) {
    die("Invalid or expired token.");
}
?>
<!DOCTYPE html> 
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="c:\Users\HP\Documents\PROJECTS_AT_PLAT\fontawesome-free-6.4.2-web">
	    <link rel="stylesheet" href="c:\Users\HP\Documents\PROJECTS_AT_PLAT\bootstrap-icons-1.11.1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <script src="c:\Users\HP\Documents\PROJECTS_AT_PLAT\fontawesome-free-6.4.2-web\js\all.js"></script>
        <script src="https://kit.fontawesome.com/c5355fa9b1.js" crossorigin="anonymous"></script>   
        <title>Reset Password Page</title>
    </head>
        <body>

<div class="container">
<h1 class="text-dark text-center page-header">RESET PASSWORD</h1>
<form action="update_password.php" method="POST">
    <div class="form-group">
    <input type="hidden" name="token" class="form-control" value="<?= htmlspecialchars($token) ?>">
    </div>

    <div class="form-group">
    <label>New Password</label>
    <input type="password" name="new_password" class="form-control placeholder="New Password" required>
    </div>
    <div class="form-group">
    <button type="submit" class="form-control text-white bg-dark">Update Password</button>
    </div>
</form>



<h6 class="text-center"> If you have not registered already, click on the link --> <a class="text-danger" href="..\students\student_register.php">REGISTER</a></h6>

<footer class="text-center">&#169; <span style="font-size: 15px;"><?php 
                                date_default_timezone_set("Africa/Lagos");
                                $today=  date("Y")." Students Disciplinary Actions :";
                                echo $today?></span> <span>Developed By: <a class="developer" href="https://we-solve-it.netlify.app/">WE-SOLVE-IT SOLUTIONS</a></span> </footer>

</body>
</html>
