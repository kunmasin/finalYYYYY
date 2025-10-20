<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include ("lecturerLogConnect.php"); // Include lecturer connection first
if (!isset($_COOKIE['lecturer_users'])){
    header('location: ../logins.php');
    exit;
}
$sql="SELECT * FROM `lecturer_users` WHERE email = '".$_COOKIE['lecturer_users']."'";
$user = array();

if($conn->query($sql) == TRUE){
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           $user = $row; 
        }
    } else {
        header('location: ../logins.php');
        exit;
    }
} else {
    echo "Error: " .$sql."<br>".$conn->error;
}

// Student data retrieval (before form submission)
$sql_students = "SELECT * FROM student_users";
$result_students = $conn->query($sql_students);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_offence = $_POST["student_offence"];
    $complaint_details = $_POST["complaint_details"];
    $student_name = $_POST["student_name"];

    $sql_complaint = "INSERT INTO complaints (lecturer_name, student_offence, complaint_details, student_name) VALUES ('" . $user['lecturer_name'] . "', '$student_offence', '$complaint_details', '$student_name')";

    if ($conn->query($sql_complaint) === TRUE) {
        echo "<script>alert('Complaint submitted successfully!');</script>";
    } else {
        echo "Error: " . $sql_complaint . "<br>" . $conn->error;
    }
}
$conn->close(); // Close connection once all operations are done
?>

<!DOCTYPE html> 
<html>
    <head>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../style.css">
        <script src="https://kit.fontawesome.com/c5355fa9b1.js" crossorigin="anonymous"></script>   
        <title>Dashboard</title>
        
    </head>
       <?php include ("lecturer_sidebar.php"); ?>         
    <div class="content">
    <h1 class="text-dark text-center page-header">STAFF  / LECTURER COMPLAIN</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="">
        <div class="text-left">
        <p><b class="name"> <b class="text-primary"> Mr/Mrs</b> <?php echo $user['lecturer_name'];?></b>  Welcome to the Staff / Lecturer Complain Website, where Staff can lodge compain about Student that are not commited and spoilt. This Complain will be submitted to the <b class="names">University Senate Account</b> and be reviewed for verification and implementation. !!! </p>      
    </div>
    <div class="form-group">
    <label for="" >Choose Student Name </label>
    <select name="student_name">
            <?php
            if ($result_students->num_rows > 0){
                while ($row = $result_students->fetch_assoc()){
                    echo "<option value='" . $row['names'] . "'>" . $row['names'] . "</option>";
                }
            } else {
                echo "<option value='0'>No Students Found</option>";
            }
            ?>
        </select><br>

<label for="">What is the Student Offence ?</label>
<select class="form-control" name="student_offence">
<option value="Choose The Student Offence" disabled selected>Choose The Student Offence</option>
<option value="Theft">Theft</option>
<option value="Fraud">Fraud</option>
<option value="Indiscipline">Indsicipline</option>
<option value="Poor Grade">Poor Grade</option>
<option value="Bullyig">Bullying</option>
<option value="Cultisam">Cultism</option>
</select>
</div>
    <div class="form-floating">
        <label for="">Write the complain and the details below</label>
<textarea class="form-control text-black" placeholder="Leave a comment here" name="complaint_details" id="floatingTextarea">

</textarea>
<br>

<div class="form-group">
<input type="submit" class="form-control text-white bg-dark" value="SUBMIT COMPLAIN">
</div> 
</div>


</div>

</form>
</div>

<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("active");
    }
</script>
        </body>
</html>