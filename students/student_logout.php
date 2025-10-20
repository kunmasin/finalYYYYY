<?php
setcookie('student', '', time() - 3600, "/");
header("Location: ../logins.php");
exit();
?>
