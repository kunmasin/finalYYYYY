<?php
setcookie('student', '', time() - 3600, "/");
header("Location: student_login.php");
exit();
?>
