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
        <title>Admin LogIn Page</title>
    </head>
        <body>
        <?php
    $usernames =$passwords ="";
    $usernamesErr = $passwordsErr = "";
    if (empty($_POST["usernames"])){
        $usernamesErr="username is required";
    }else{
        $usernames= test_input($_POST["usernames"]);
    }

    if(empty($_POST["passwords"])){
        $passwordsErr="Password is not correct";
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
            <h1 class="text-dark text-center page-header">ADMINISTRATOR LOGIN PAGE</h1>
            <div class="container">
                <form action="adminLogin.php" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="usernames" class="form-control" placeholder="Enter Your Username"><br>
                </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="passwords" class="form-control" placeholder="Enter Your Password" autocomplete="off"><br>
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


        <h6 class="text-center"> If you have not registered already, click on the link --> <a class="text-danger" href="..\admin\adminRegisteration.php">REGISTER</a></h6>

        <footer class="text-center">&#169; <span style="font-size: 15px;"><?php 
                                        date_default_timezone_set("Africa/Lagos");
                                        $today=  date("Y")." Students Disciplinary Actions :";
                                        echo $today?></span> <span>Developed By: <a class="developer" href="https://we-solve-it.netlify.app/">WE-SOLVE-IT SOLUTIONS</a></span> </footer>


        <?php 
    if (!empty($_POST)){
         $servername= "localhost";
        $username= "root";
        $password= "";
        $dbname= "student_discipline";
        $conn= mysqli_connect($servername,$username,$password,$dbname);
        $sql= "SELECT * FROM `admin_users` WHERE usernames  LIKE '$usernames' AND passwords LIKE '$passwords'";
    if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}else{
    
}
                if($conn->query($sql) == TRUE){
                    $sql= "SELECT * FROM `admin_users` WHERE usernames  LIKE '$usernames' AND passwords LIKE '$passwords'";
                    
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "Login Successful for :<br>"."Line ". $row["s/N"]."<br>". " - Name: " . $row["usernames"];
                    setcookie('admin', $row["usernames"], time() + (3000), "/");
                    header('location: adminDashboard.php');
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