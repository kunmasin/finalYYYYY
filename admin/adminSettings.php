<?php 
include ("adminLogConnect.php");
if (!isset($_COOKIE['admin_users'])){
    header('location: ../logins.php');
    exit;
}
$sql="SELECT * FROM `admin_users` WHERE email LIKE '".$_COOKIE['admin_users']."'";
$user = array();

if($conn->query($sql) == TRUE){
    $sql="SELECT * FROM `admin_users` WHERE email LIKE '".$_COOKIE['admin_users']."'";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $user = $row; 
        }
    }else{
        header('location: ../logins.php');
        exit;
    }
    
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}
$conn->close();
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

#$sql = "UPDATE admin_users SET fullname=fullname, usernames=usernames, email=email, position=position, gender=gender, phone_number=phone_number, address=address  WHERE usernames = usernames ";

#if ($conn->query($sql) === TRUE) {
 #   echo "Record updated successfully";
#} else {
 #   echo "Error updating record: " . $conn->error;
#}

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
        <?php include("admin_sidebar.php") ;?>   
        <div class="content">
            <div class="container text-center">
            <h1 class="text-dark page-header">ACCOUNT SETTINGS</h1>
            <form action="">
            <div class="container">
            
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Your Full Name" required value="<?php echo $user['fullname'] ?>" readonly><br>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Your User Name" required value="<?php echo $user['usernames'] ?>" readonly><br>
            </div>
            
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter Your Email Address" required value="<?php echo $user['email'] ?>" readonly><br>
            </div>
           
            <div class="form-group">
                <input type="text" class="form-control" name="" id="" placeholder="Enter Your Position" value="<?php echo $user['position'] ?>" readonly><br>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Your Gender" required value="<?php echo $user['gender'] ?>" readonly><br>
            </div>
           <div class="form-group">
                <input type="tel" class="form-control" placeholder="Phone Number" required value="<?php echo $user['phone_number'] ?>" readonly><br>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Home Address" required value="<?php echo $user['address'] ?>" readonly><br>
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