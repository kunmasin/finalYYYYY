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
        <title>LogIn Page</title>
    </head>
        <body>
        <?php
    $email =$passwords ="";
    $emailErr = $passwordErr = "";
    if (empty($_POST["email"])){
        $emailErr="E-mail is required";
    }else{
        $email= test_input($_POST["email"]);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
     if(empty($_POST["passwords"])){
        $passwordErr="Password is not correct";
     } else{
        $passwords=test_input($_POST["passwords"]);
     }

    function test_input($data){
        $data= trim($data);
        $data= stripslashes($data);
        $data= htmlspecialchars($data);
        return $data;
    }
    ?>
            <div class="container mt-5">
            <h1 class="text-dark text-center page-header">LOGIN PAGE</h1>
            <div class="container">
                <form action="student_login.php" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                <label for="">E-mail Address</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Your E-mail Address"><br>
                </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="passwords" class="form-control" placeholder="Enter Your Passwords" autocomplete="off"><br>
            </div>
           <!-- <div class="form-group">
            <label for="">Pick Your Role</label>
             <select id="role" name="role" class="form-control">
                  <option value="Role" disabled selected>Role</option>
                  <option value="student">Student</option>
                  <option value="teacher">Teacher</option>
                 </select>

            </div> -->
            <div class="form-group">
                <input type="submit" class="form-control text-white bg-dark" value="LOGIN">
            </div>
            </form>
            </div>
        </div>


        <h6 class="text-center"> If you have not registered already, click on the link --> <a class="text-danger" href="..\students\student_register.php">REGISTER</a>  or <a class="text-danger" href="..\students\forget_password.php">FORGET PASSWORD</a> </h6>

        <footer class="text-center">&#169; <span style="font-size: 15px;"><?php 
                                        date_default_timezone_set("Africa/Lagos");
                                        $today=  date("Y")." Students Disciplinary Actions :";
                                        echo $today?></span> <span>Developed By: <a class="developer" href="https://we-solve-it.netlify.app/">ONIYE ABDULLAHI MASUD (21/02/SE/2/001) SOFTWARE ENGINEERING DEPEARTMENT</a></span> </footer>


        <?php 
    if (!empty($_POST)){
         $servername= "localhost";
        $username= "root";
        $password= "";
        $dbname= "student_discipline";
        $conn= mysqli_connect($servername,$username,$password,$dbname);
        $sql= "SELECT * FROM `student_users` WHERE email  LIKE '$email' AND passwords LIKE '$passwords'";
    if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}else{
    
}
                if($conn->query($sql) == TRUE){
                    $sql= "SELECT * FROM `student_users` WHERE email  LIKE '$email' AND passwords LIKE '$passwords'";
                    
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "Login Successful for :<br>"."Line ". $row["id"]."<br>". " - Name: " . $row["names"];
                    setcookie('student', $row["email"], time() + (3000), "/");
                    header('location: student_dashboard.php');
                    exit;
                }
            }else{
                echo " Invalid Username and Password";
            }
            
        }else{
            echo "Error: " .$sql."<br>".$conn->error;
        }
        $conn->close();
    }
    ?>
</body>
</html>