<?php
setcookie('lecturers', '', time() - 3600, "/");
header("Location: lecturerLogin.php");
exit();
?>
