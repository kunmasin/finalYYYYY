<?php 
include ("cookie.php");
?>
<?php
$servername= "localhost";
$username="root";
$password="";
$dbname="student_discipline";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE student_users SET names=names, email=email, passwords=passwords, lvl_admitted=lvl_admitted, dob=dob, matric_no=matric_no, course=course, faculty=faculty, gender=gender, phoneNumber=phoneNumber  WHERE names = names ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html> 
<php>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="c:\Users\HP\Documents\PROJECTS_AT_PLAT\fontawesome-free-6.4.2-web">
	    <link rel="stylesheet" href="c:\Users\HP\Documents\PROJECTS_AT_PLAT\bootstrap-icons-1.11.1">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="..\style.css">
	    <script src="c:\Users\HP\Documents\PROJECTS_AT_PLAT\fontawesome-free-6.4.2-web\js\all.js"></script>
        <script src="https://kit.fontawesome.com/c5355fa9b1.js" crossorigin="anonymous"></script>   
        <title>Dashboard</title>
        
    </head>
        <body>
        
                                                <?php include("student_sidebar.php") ;?>

                          <div class="content">
            <div class="container text-center">
            <h1 class="text-dark page-header">ACCOUNT UPDATE</h1>
            <form action="">
            <div class="container">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Your Full Name" required value="<?php echo $user['names'] ?>" readonly><br>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter Your Email Address" required value="<?php echo $user['email'] ?>" readonly><br>
            </div>
           
            <div class="form-group">
                <input type="date" class="form-control" name="" id="" placeholder="Enter Your Date of Birth" value="<?php echo $user['dob'] ?>" readonly><br>
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" placeholder="Enter Your Phone Number" required value="<?php echo $user['phoneNumber'] ?>" readonly><br>
            </div>
           <div class="form-group">
                <input type="text" class="form-control" placeholder="Matric Number" required value="<?php echo $user['matric_no'] ?>" readonly><br>
            </div>
            <div class="form-group">
                <select class="form-control" value="<?php echo $user['course'] ?>" readonly>
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
                <select class="form-control" value="<?php echo $user['faculty'] ?>" readonly>
                    <option selected disabled>Select Your Faculty </option>
                    <option>Science and Computing</option>
                    <option>Humanaties and Management</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" value="<?php echo $user['lvl_admitted'] ?>" readonly>
                    <option selected disabled>Choose Level of Admission</option>
                    <option>100 Level</option>
                    <option>200 Level</option>
                </select>    
                <br>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control text-white bg-dark" value="UPDATE ACCOUNT">
            </div>
            </div>
        </form>
        </div>
        </div>
        <script>
            function toggleSidebar() {
                var sidebar = document.getElementById("sidebar");
                sidebar.classList.toggle("active");
            }
        </script>
        </body>
        </php>