<?php 
include ("lecturerLogConnect.php");
if (!isset($_COOKIE['lecturer_users'])){
    header('location: ../logins.php');
    exit;
}
$sql="SELECT * FROM `lecturer_users` WHERE email LIKE '".$_COOKIE['lecturer_users']."'";
$user = array();

if($conn->query($sql) == TRUE){
    $sql="SELECT * FROM `lecturer_users` WHERE email LIKE '".$_COOKIE['lecturer_users']."'";
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

$sql = "UPDATE lecturer_users SET lecturer_name=lecturer_name, email=email, office=office, gender=gender, phone_number=phone_number, address=address  WHERE lecturer_name = lecturer_name";

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
          <?php include ("lecturer_sidebar.php") ;?>  
                         <div class="content">
            <div class="container text-center">
            <h1 class="text-dark page-header">ACCOUNT SETTINGS</h1>
            <form action="">
            <div class="container">
            
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Your Full Name" required value="<?php echo $user['lecturer_name'] ?>"><br>
            </div>
    
            
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter Your Email Address" required value="<?php echo $user['email'] ?>"><br>
            </div>
           
            <div class="form-group">
                <input type="text" class="form-control" name="" id="" placeholder="Enter Your Position" value="<?php echo $user['office'] ?>"><br>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Your Gender" required value="<?php echo $user['gender'] ?>"><br>
            </div>
           <div class="form-group">
                <input type="tel" class="form-control" placeholder="Phone Number" required value="<?php echo $user['phone_number'] ?>"><br>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Home Address" required value="<?php echo $user['address'] ?>"><br>
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