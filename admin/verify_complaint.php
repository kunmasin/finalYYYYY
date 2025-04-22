<?php
include("adminLogConnect.php"); // Include your database connection file

if (isset($_GET['id'])) {
    $complaint_id = $_GET['id'];

    // Update status to Verified (using prepared statements)
    $updateSql = "UPDATE complaints SET status = 'Verified' WHERE complaint_id = ?";
    $stmtUpdate = $conn->prepare($updateSql);
    $stmtUpdate->bind_param("i", $complaint_id);

    if ($stmtUpdate->execute()) {
        $stmtUpdate->close();

        // Retrieve student_name and complaint details (using prepared statements)
        $selectSql = "SELECT student_name, student_offence FROM complaints WHERE complaint_id = ?";
        $stmtSelect = $conn->prepare($selectSql);
        $stmtSelect->bind_param("i", $complaint_id);

        if ($stmtSelect->execute()) {
            $result = $stmtSelect->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $student_name = $row['student_name'];
                $student_offence = $row['student_offence'];

                // Summon details (You can get these from a form or database)
                $summon_date = "2024-12-15"; // Example date
                $summon_time = "10:00 AM"; // Example time
                $summon_location = "Dean's Office"; // Example location

                // Insert notice (using prepared statements)
                $noticeText = "A complaint regarding " . $student_offence . " has been Logged Against You, Kindly Visit the Senate Building.";
                $insertNoticeSql = "INSERT INTO notices (student_name, notice_text, complaint_id) VALUES (?, ?, ?)";
                $stmtInsert = $conn->prepare($insertNoticeSql);
                $stmtInsert->bind_param("ssi", $student_name, $noticeText, $complaint_id); // "ssi" for string, string, integer

                if ($stmtInsert->execute()) {
                    echo "<script>alert('Complaint verified and notice added!'); window.location.href = 'adminComplaints.php';</script>";
                } else {
                    echo "Error adding notice: " . $stmtInsert->error;
                }
                $stmtInsert->close();
            }
            $stmtSelect->close();
        } else {
            echo "Error retrieving complaint details: " . $stmtSelect->error;
            $stmtSelect->close();
        }
    } else {
        echo "Error updating record: " . $stmtUpdate->error;
        $stmtUpdate->close();
    }
}

$conn->close();
?>