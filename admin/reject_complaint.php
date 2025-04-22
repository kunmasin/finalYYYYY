<?php
include("adminLogConnect.php"); // Include your database connection file

if (isset($_GET['id'])) {
    $complaint_id = $_GET['id'];

    $sql = "UPDATE complaints SET status = 'Rejected' WHERE complaint_id = $complaint_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Complaint rejected!'); window.location.href = 'adminComplaints.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>