<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c5355fa9b1.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
$email = $passwords = "";
$emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "E-mail is required";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["passwords"])) {
        $passwordErr = "Password is required";
    } else {
        $passwords = $_POST["passwords"];
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (empty($emailErr) && empty($passwordErr)) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "student_discipline";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        function checkUser($conn, $table, $email, $passwords, $redirectMap) {
            $sql = "SELECT * FROM `$table` WHERE email = '$email'";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Replace this if you're using hashed passwords
                if ($row['passwords'] === $passwords) {
                    $role = $table;
                    setcookie($role, $row["email"], time() + 3600, "/");
                    header("Location: " . $redirectMap[$role]);
                    exit;
                }
            }
            return false;
        }

        $redirects = [
            "admin_users" => "../finalYYYYY/admin/adminDashboard.php",
            "lecturer_users" => "../finalYYYYY/lecturer/lecturerDashboard.php",
            "student_users" => "../finalYYYYY/students/student_dashboard.php"
        ];

        if (
            !checkUser($conn, "admin_users", $email, $passwords, $redirects) &&
            !checkUser($conn, "lecturer_users", $email, $passwords, $redirects) &&
            !checkUser($conn, "student_users", $email, $passwords, $redirects)
        ) {
            echo "<div class='alert alert-danger text-center'>Invalid email or password.</div>";
        }

        $conn->close();
    }
}
?>

<div class="container mt-5">
    <h1 class="text-center text-dark mb-4">LOGIN PAGE</h1>
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="email">E-mail Address</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Your E-mail Address" value="<?php echo $email; ?>">
                    <small class="text-danger"><?php echo $emailErr; ?></small>
                </div>
                <div class="form-group">
                    <label for="passwords">Password</label>
                    <input type="password" name="passwords" class="form-control" placeholder="Enter Your Password" autocomplete="off">
                    <small class="text-danger"><?php echo $passwordErr; ?></small>
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control text-white bg-dark" value="LOGIN">
                </div>
            </form>

            <h6 class="text-center mt-3">
                If you have not registered, click --> 
                <a class="text-danger" href="../finalYYYYY/students/student_register.php">REGISTER</a> 
                or 
                <a class="text-danger" href="../finalYYYYY/students/forget_password.php">FORGOT PASSWORD</a>
            </h6>
        </div>
    </div>
</div>

<footer class="text-center mt-5">
    &#169; <span style="font-size: 15px;">
        <?php 
        date_default_timezone_set("Africa/Lagos");
        echo date("Y") . " Students Disciplinary Actions :";
        ?>
    </span> 
    <span>Developed By: 
        <a class="developer" href="https://we-solve-it.netlify.app/">ONIYE ABDULLAHI MASUD (21/02/SE/2/001) SOFTWARE ENGINEERING DEPARTMENT</a>
    </span>
</footer>

</body>
</html>
