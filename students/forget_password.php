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
        <title>Forget Password Page</title>
    </head>
        <body>

<div class="container">
<h1 class="text-dark text-center page-header">FORGET PASSWORD</h1>
<form action="send_reset_link.php" method="POST">
  <div class="form-group">
  <label>E-mail Address</label>
  <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
  </div>
  <button type="submit" class="form-control text-white bg-dark">Send Reset Link</button>
</form>
</div>
<h6 class="text-center"> If you have not registered already, click on the link --> <a class="text-danger" href="..\students\student_login.php">LOGIN</a></h6>

<footer class="text-center">&#169; <span style="font-size: 15px;"><?php 
                                date_default_timezone_set("Africa/Lagos");
                                $today=  date("Y")." Students Disciplinary Actions :";
                                echo $today?></span> <span>Developed By: <a class="developer" href="https://we-solve-it.netlify.app/">WE-SOLVE-IT SOLUTIONS</a></span> </footer>

</body>
</html>