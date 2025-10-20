<!DOCTYPE html> 
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/c5355fa9b1.js" crossorigin="anonymous"></script>   
        <title>Registeration Page</title>
        <style>
            label{
                text-align: left;
            }
        </style>
    </head>
        <body>

<!--Starting the php reg code-->
<?php
//Input variables set to empty for both error and normal  variables.
$lecturer_name_Err  = $passwordsErr = $emailErr = $phone_numberErr = $genderErr =  $officeErr = $addressErr = " ";
$lecturer_name = $passwords = $email = $phone_number = $gender = $office =  $address = $image = $target_file = "";
$uploadOk = 1;



include("lecturerLogConnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["lecturer_name"])){
        $lecturer_name_Err= "Lecturer name is required";
    }else{
        $lecturer_name= test_input($_POST["lecturer_name"]);
        //Check if name format is valid
        if (!preg_match("/^[a-zA-Z ]*$/",$lecturer_name)) {
        $lecturer_name_Err = "Only letters and white space allowed";
      }
    }


    if (empty($_POST["passwords"])){    
        $passwordsErr="Password is required";
    }else{
        $passwords= test_input($_POST["passwords"]);
    }

    if (empty($_POST["email"])){
        $emailErr="email is required";
    }else{
        $email= test_input($_POST["email"]);
        //Check if the e-mail format is correct 
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
  
    if (empty($_POST["phone_number"])){
        $phone_numberErr="Phone is required";
    }else{
        $phone_number= test_input($_POST["phone_number"]);
    }
   
    
    if(empty($_POST["gender"])){
        $genderErr="Gender is required";
    }else{
    $gender= test_input($_POST["gender"]);
    }

    if(empty($_POST["office"])){
        $officeErr="Office is required";
    }else{
    $office= test_input($_POST["office"]);
    }

    if(empty($_POST["address"])){
        $addressErr="Address is required";
    }else{
    $address= test_input($_POST["address"]);
    }

    // Image Upload
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $target_dir = "uploaded_images/";
        $image_name = time() . '_' . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $maxFileSize = 5000000; // 5MB

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            $imageErr = "File is not an image.";
            $uploadOk = 0;
        }

        if ($_FILES["image"]["size"] > $maxFileSize) {
            $imageErr = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $imageErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = $target_file; // Store the file path for database insertion.
            } else {
                $imageErr = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $imageErr = "Please upload an image.";
    }

    // Database Insertion (Example - you'll need to adapt this)
    if (empty($namesErr) && empty($emailErr) && empty($passwordErr) && empty($lvl_admittedErr) && empty($dobErr) && empty($matric_noErr) && empty($courseErr) && empty($facultyErr) && empty($genderErr) && empty($phoneNumberErr) && empty($imageErr)) {
        // Database connection and insertion logic here
        // Example (using PDO):
        /*
        $pdo = new PDO("mysql:host=localhost;dbname=your_database", "your_user", "your_password");
        $stmt = $pdo->prepare("INSERT INTO users (names, email, password, level, dob, matric, course, faculty, gender, phone, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$names, $email, $hashedPassword, $lvl_admitted, $dob, $matric_no, $course, $faculty, $gender, $phoneNumber, $image]);
        echo "Registration successful!";
        */
    }
    $sql="INSERT INTO `lecturer_users` (lecturer_name,  passwords,  email, phone_number, gender, office, address, image) VALUES ('$lecturer_name', '$passwords', '$email', '$phone_number', '$gender', '$office', '$address', '$target_file')";
if($conn ->query($sql) == TRUE){
   // echo "Details Recorded Successfully";
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}
   
    }
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!--End of Php Reg Code-->
            <div class="container">
            <h1 class="text-dark text-center page-header mt-5">LECTURER REGISTERATION PAGE</h1>
            <form action="lecturerRegisteration.php" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="container">
                <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" class="form-control" name="lecturer_name" placeholder="Enter Your Full Name"  required>
                <br>
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="passwords" placeholder="Enter Your Password"  required>
                <br>
            </div>

            <div class="form-group">
            <label for="">E-mail Addess</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address"  required>
                <br>
            </div>

            <div class="form-group">
            <label for="">Click to Insert Your Profile Image</label>
                <input type="file" class="form-control" name="image" value="<?php echo $image; ?>"><br>
            </div>
            
            <div class="form-group">
            <label for="">Phone Number</label>
                <input type="tel" class="form-control" name="phone_number" id="" placeholder="Enter Your Phone Number" required>
                <br>
            </div>

            
           
            <div class="form-group">
            <label for="">Gender Type</label>
                <select class="form-control" id='gender' name="gender" required>
                    <option selected disabled>Select Your Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>    
            </div>
            

            <div class="form-group">
            <label for="">Office</label>
                <input type="text" class="form-control" name="office" placeholder="Enter Your Position" required><br>
            </div>

             <div class="form-group">
            <label for="">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter Your Address" required><br>
            </div>

            <div class="form-group">
                <input type="submit" class="form-control text-white bg-dark" value="REGISTER"> 
            </div>
            </div>
        </form>

                <h6 class="text-center"> If you have registered already, click on the link --> <a class="text-danger" href="../logins.php">LOGIN</a></h6>
        </div>

        <footer class="text-center">&#169; <span style="font-size: 15px;"><?php 
                                        date_default_timezone_set("Africa/Lagos");
                                        $today=  date("Y")." Students Disciplinary Actions :";
                                        echo $today?></span> </span> <span>Developed By: <a class="developer" href="https://we-solve-it.netlify.app/">ONIYE ABDULLAHI MASUD (21/02/SE/2/001) SOFTWARE ENGINEERING DEPEARTMENT</a></span> </footer>

        </body>
        </html>