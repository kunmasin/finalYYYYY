<?php
setcookie('lecturers', '', time() - 3600, "/");
header("Location: ../logins.php");
exit();
?>
