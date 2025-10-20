<?php
include ("adminLogConnect.php");
include ("cookie.php");
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
// Database connection details
$host = 'localhost';
$dbname = 'student_discipline';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

function getStudentComplaints($pdo, $studentName) {
    $stmt = $pdo->prepare("
        SELECT
            *
        FROM
            complaints
        WHERE
            student_name = :student_name
        ORDER BY
            complaint_date
    ");
    $stmt->bindParam(':student_name', $studentName);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function generateStudentReports($complaintDataArray) {
    if (empty($complaintDataArray)) {
        return "<p class='text-warning'>No disciplinary incidents found for this student.</p>";
    }

    $output = "<div class='report-wrapper' style='font-family: sans-serif;'>";
    $output .="<img src='..\imgs\Ahman.webp' class='report-image'>";
    $output .= "<h2 class='report-title' style='text-align: center;'>Disciplinary Reports for " . htmlspecialchars($complaintDataArray[0]['student_name']) .' on : ' . date('y-m-d') ."</h2>";
    $output .= "<hr class='report-divider'>";

    foreach ($complaintDataArray as $complaintData) {
        $dateTime = new DateTime($complaintData['complaint_date']); // Create a DateTime object
        $formattedDate = $dateTime->format('l, F j, Y'); // Format the date

        $output .= "<div class='report-incident' style='margin-bottom: 20px; border: 1px solid #ddd; padding: 15px;'>";
        $output .= "<h3 class='incident-title' style='text-align: left;'>Incident on " . htmlspecialchars($formattedDate) . "</h3>"; // Use the formatted date
        $output .= "<table class='report-table' style='width: 100%; border-collapse: collapse;'>";
        $output .= "<tbody>";
        $output .= "<tr><td class='report-label'>Reported By</td><td class='report-value'>" . htmlspecialchars($complaintData['lecturer_name']) . "</td></tr>";
        $output .= "<tr><td class='report-label'>Offence</td><td class='report-value'>" . htmlspecialchars($complaintData['student_offence']) . "</td></tr>";
        $output .= "<tr><td class='report-label'>Status</td><td class='report-value'>" . htmlspecialchars($complaintData['status']) . "</td></tr>";
        $output .= "</tbody>";
        $output .= "</table>";
        $output .= "</div>";
    }

    $output .= "<button onclick='window.print()' class='btn btn-info mt-2 print-button'>Print All Reports for This Student</button>";
    $output .= "</div>";
    return $output;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['student_name'])) {
        $studentName = $_POST['student_name'];
        $complaintDataArray = getStudentComplaints($pdo, $studentName);
        echo generateStudentReports($complaintDataArray);
    } else {
        echo "<p class='text-danger'>Please provide a Student Name.</p>";
    }
}
// The initial HTML structure with the form and report container is now outside this PHP block.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generate Student Reports</title>
    <style type="text/css" media="print">
      @page {
        size: auto;
        margin: 0mm;
      }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="c:\Users\HP\Documents\PROJECTS_AT_PLAT\fontawesome-free-6.4.2-web">
    <link rel="stylesheet" href="c:\Users\HP\Documents\PROJECTS_AT_PLAT\bootstrap-icons-1.11.1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="..\style.css">
    <script src="c:\Users\HP\Documents\PROJECTS_AT_PLAT\fontawesome-free-6.4.2-web\js\all.js"></script>
    <script src="https://kit.fontawesome.com/c5355fa9b1.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .report-wrapper {
            font-family: sans-serif;
            padding: 20px;
        }
        .report-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .report-incident {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 15px;
        }
        .incident-title {
            text-align: left;
            margin-top: 0;
        }
        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .report-table th, .report-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .report-label {
            font-weight: bold;
        }
        .report-image img{
            width: 300px;
            height: auto;
            border-radius: 100%;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>

<?php include("admin_sidebar.php"); ?>                         
<div class="content">
    <div class="container">
        <h1 class="text-center">Generate Reports for a Student</h1>
        <form id="reportForm" method="POST">
            <div class="form-group">
                <label for="student_name">Enter Student Name:</label>
                <input type="text" id="student_name" class="form-control" name="student_name" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="generateReport()">Generate Reports</button>
        </form>

        <div id="reportContainer" class="mt-4">
        </div>
    </div>
</div>

<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("active");
    }

    function generateReport() {
        var studentName = document.getElementById("student_name").value;
        var formData = new FormData(document.getElementById("reportForm"));

        fetch('adminGenerateReport.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById("reportContainer").innerHTML = data;
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById("reportContainer").innerHTML = '<p class="text-danger">An error occurred while fetching the reports.</p>';
        });
    }
</script>
</body>
</html>