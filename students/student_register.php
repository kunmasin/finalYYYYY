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
// Input variables set to empty for both error and normal variables.
$namesErr = $emailErr = $passwordErr = $lvl_admittedErr = $dobErr = $matric_noErr = $courseErr = $facultyErr = $genderErr = $phoneNumberErr = $imageErr = "";
$names = $email = $passwords = $lvl_admitted = $dob = $matric_no = $course = $faculty = $gender = $phoneNumber = $image = $target_file = "";
$uploadOk = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Names Validation
    if (empty($_POST["names"])) {
        $namesErr = "Name is required";
    } else {
        $names = test_input($_POST["names"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $names)) {
            $namesErr = "Only letters and white space allowed";
        }
    }

    // Phone Number Validation
    if (empty($_POST["phoneNumber"])) {
        $phoneNumberErr = "Phone is required";
    } else {
        $phoneNumber = test_input($_POST["phoneNumber"]);
    }

    // Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Level Validation
    if (empty($_POST["level"])) {
        $lvl_admittedErr = "Level is required";
    } else {
        $lvl_admitted = test_input($_POST["level"]);
    }

    // Password Validation
    if (empty($_POST["passwords"])) {
        $passwordErr = "Password is required";
    } else {
        $passwords = test_input($_POST["passwords"]);
        // Hash the password for security
        $hashedPassword = password_hash($passwords, PASSWORD_DEFAULT);
    }

    // Matric Number Validation
    if (empty($_POST["matric"])) {
        $matric_noErr = "Matric is required";
    } else {
        $matric_no = test_input($_POST["matric"]);
    }

    // Date of Birth Validation
    if (empty($_POST["dob"])) {
        $dobErr = "DOB is required";
    } else {
        $dob = test_input($_POST["dob"]);
    }

    // Gender Validation
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // Faculty Validation
    if (empty($_POST["faculty"])) {
        $facultyErr = "Faculty is required";
    } else {
        $faculty = test_input($_POST["faculty"]);
    }

    // Course Validation
    if (empty($_POST["course"])) {
        $courseErr = "Course is required";
    } else {
        $course = test_input($_POST["course"]);
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
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!--End of Php Reg Code-->
            <div class="container">
            <h1 class="text-dark text-center page-header mt-5">REGISTERATION PAGE</h1>
            <form action="student_register.php" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="container">
                <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" class="form-control" name="names" placeholder="Enter Your Full Name" value="<?php echo $names; ?>" required>
                <br>
            </div>
            <div class="form-group">
            <label for="">E-mail Addess</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email Address" value="<?php echo $email; ?>" required>
                <br>
            </div>
            <div class="form-group">
            <label for="">Click to Insert Your Profile Image</label>
                <input type="file" class="form-control" name="image" value="<?php echo $image; ?>"><br>
            </div>
            <div class="form-group">
            <label for="">Date of Birth</label>
                <input type="date" class="form-control" name="dob" id="" placeholder="Enter Your Date of Birth" value="<?php echo $dob; ?>">
                <br>
            </div>

            <div class="form-group">
            <label for="">Role in the University</label>
             <select id="role" name="role" class="form-control">
                  <option value="Role" disabled selected>Role</option>
                  <option value="student">Student</option>
                  <option value="teacher">Teacher</option>
                 </select>

            </div>
            <div class="form-group">
            <label for="">Phone Number</label>
                <input type="tel" class="form-control" name="phoneNumber" placeholder="Enter Your Phone Number" value="<?php echo $phoneNumber; ?>" required>
                <br>
            </div>
           <div class="form-group">
           <label for="">Matric Number</label>
                <input type="text" class="form-control" name="matric" placeholder="Matric Number" value="<?php echo $matric_no; ?>" required>
                <br>
            </div>
            <div class="form-group">
            <label for="">Course of Study</label>
                <select class="form-control" id="course" name="course" value="<?php echo $course; ?>">
                    <option selected disabled>Select Your Course of Study</option>
                    <option>Software Engineering</option>
                    <option>Computer Science</option>
                    <option>Cyber Security</option>
                    <option>Economics</option>
                    <option>Accounting</option>
                    <option>International Relation</option>
                    <option>English</option>
                    <option>Mass Communication</option>
                    <option>Microbiology</option>
                </select><br>
            </div>
            <div class="form-group">
            <label for="">Faculty</label>
                <select class="form-control" name="faculty" value="<?php echo $faculty; ?>">
                    <option selected disabled>Select Your Faculty </option>
                    <option>Science and Computing</option>
                    <option>Humanaties and Management</option>
                </select>
            </div>
            <div class="form-group">
            <label for="">Level of Admission</label>
                <select class="form-control" id='level' name="level" value="<?php echo $lvl_admitted; ?>">
                    <option selected disabled>Choose Level of Admission</option>
                    <option>100 Level</option>
                    <option>200 Level</option>
                </select>    
            </div>

            <div class="form-group">
            <label for="">Gender Type</label>
                <select class="form-control" id='gender' name="gender" value="<?php echo $gender; ?>">
                    <option selected disabled>Select Your Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>    
            </div>
            

            <div class="form-group">
            <label for="">Password</label>
                <input type="password" class="form-control" name="passwords" placeholder="Create Password" required><br>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control text-white bg-dark" value="REGISTER"> <a href="..\students\student_login.php"></a>
            </div>
            </div>
        </form>

                <h6 class="text-center"> If you have registered already, click on the link --> <a class="text-danger" href="..\students\student_login.php">LOGIN</a></h6>
        </div>

        <footer class="text-center">&#169; <span style="font-size: 15px;"><?php 
                                        date_default_timezone_set("Africa/Lagos");
                                        $today=  date("Y")." Students Disciplinary Actions :";
                                        echo $today?></span> <span>Developed By: <a class="developer" href="https://we-solve-it.netlify.app/">WE-SOLVE-IT SOLUTIONS</a></span> </footer>

<?php
include("student_reg_con.php");
?>
        </body>
        </html>