<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Disciplinary System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
    }
    .hero {
      background: linear-gradient(rgba(0,0,0,0.7), rgba(0,100,0,0.7)), url('imgs/disciplinary-hands.jpg') no-repeat center center;
      background-size: cover;
      color: white;
      padding: 100px 0;
      text-align: center;
    }
    .features i {
      font-size: 2rem;
      color: green;
    }
    .footer {
      background: #06491f;
      color: white;
      padding: 20px 0;
    }
    .footer a {
      color: #ccc;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1 class="display-4 fw-bold">Directory of Students Disciplinary Actions</h1>
      <p class="lead">Promoting fairness, accountability, and transparency in student conduct.</p>
      <a href="logins.php" class="btn btn-success btn-lg me-2">Login</a>
      <a href="students/student_register.php" class="btn btn-outline-light btn-lg">Register</a>
    </div>
  </section>

 <!-- Features Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">System Features</h2>
    <div class="row g-4 text-center features">
      <div class="col-md-4">
        <img src="imgs/report.jpg" alt="Report Misconduct" class="img-fluid rounded mb-3" style="height: 150px; object-fit: cover;">
       <!-- <i class="fa fa-user-shield mb-2"></i> -->
        <h5>Report Misconduct</h5>
        <p>Lecturers can report any form of student misconduct directly on the platform.</p>
      </div>
      <div class="col-md-4">
        <img src="imgs/evaluation.png" alt="Fair Evaluation" class="img-fluid rounded mb-3" style="height: 150px; object-fit: cover;">
       <!-- <i class="fa fa-balance-scale mb-2"></i> -->
        <h5>Fair Evaluation</h5>
        <p>Admin verifies each complaint and ensures fair disciplinary evaluation.</p>
      </div>
      <div class="col-md-4">
        <img src="imgs/studentNotified.jpg" alt="Student Notifications" class="img-fluid rounded mb-3" style="height: 150px; object-fit: cover;">
        <!--<i class="fa fa-bell mb-2"></i>-->
        <h5>Student Notifications</h5>
        <p>Students are notified when summoned or judged, with access to appeal options.</p>
      </div>
    </div>
  </div>
</section>

  <!-- How It Works -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">How It Works</h2>
    <div class="row text-center">
      <div class="col-md-4">
        <img src="imgs/submit-report.png" alt="Submit Report" class="img-fluid rounded mb-3" style="height: 150px; object-fit: cover;">
        <h6>1. Submit Report</h6>
        <p>Lecturer submits complaint about a student violation.</p>
      </div>
      <div class="col-md-4">
        <img src="imgs/admin-review.jpg" alt="Admin Review" class="img-fluid rounded mb-3" style="height: 150px; object-fit: cover;">
        <h6>2. Admin Review</h6>
        <p>Admin reviews complaint and decides whether to proceed with a panel.</p>
      </div>
      <div class="col-md-4">
        <img src="imgs/studentNotice.jpg" alt="Student Notified" class="img-fluid rounded mb-3" style="height: 150px; object-fit: cover;">
        <h6>3. Student Notified</h6>
        <p>Student receives official notice to appear before the disciplinary panel.</p>
      </div>
    </div>
  </div>
</section>

  <!-- FAQs -->
  <section class="bg-light py-5">
    <div class="container">
      <h2 class="text-center mb-4">Frequently Asked Questions</h2>
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="faq1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne">
              Is this information private?
            </button>
          </h2>
          <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Yes, all student data and disciplinary reports are confidential and securely handled.
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="faq2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo">
              Can students respond to reports?
            </button>
          </h2>
          <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              Yes, students can view and respond to any reports filed against them, including presenting evidence.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="bg-light py-5">
  <div class="container">
    <h2 class="text-center mb-4">About the Developer</h2>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne">
            Who is the Developer?
          </button>
        </h2>
        <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body text-center">
            <!-- Developer Picture -->
            <img src="oniye.png" alt="Oniye Abdullahi Masud" class="img-fluid rounded-circle mb-3" style="max-width: 150px; border: 4px solid #ccc;">

            <!-- Developer Info -->
            <p><strong>Oniye Abdullahi Masud</strong> is a 400-level Software Engineering student at <strong>Ahman Pategi University</strong>, who has successfully completed his final year examinations and is currently awaiting convocation.</p>

            <p>He is a passionate and versatile tech enthusiast with hands-on experience across multiple disciplines including:</p>
            <ul class="text-start d-inline-block">
              <li>💻 Full-stack Web Development (HTML, CSS, JavaScript, PHP, MySQL)</li>
              <li>🎨 Graphic Design & UI/UX Prototyping</li>
              <li>🎥 Video Content Creation & Editing</li>
              <li>🧠 Software Engineering & Problem Solving</li>
            </ul>

            <p>Oniye has developed and deployed various web-based solutions aimed at solving real-world problems—one of which is this project, serving as his <strong>final year project</strong>.</p>

            <p>In addition to his technical skills, Oniye also brings leadership and governance experience, having served as the <strong>Auditor General</strong> of the <strong>Student Representative Council (SRC)</strong> at Ahman Pategi University. In this role, he promoted transparency, accountability, and student welfare.</p>

            <p>He is passionate about innovation and is always eager to take on new challenges in software engineering, UI/UX, creative digital work, and tech-driven community development.</p>

            <p class="text-start d-inline-block">
              <strong>Contact:</strong><br>
              📧 Email: oniyeabdullahi00@gmail.com<br>
              📞 Phone: +2349015621510<br>
              🌍 Location: Kwara State, Nigeria<br>
              🔗 LinkedIn: <a href="https://www.linkedin.com/in/oniye-abdullahi-987130260?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">View Profile</a><br>
              💻 Portfolio/GitHub: <a href="https://oniye-abdullahi-profile.netlify.app/" target="_blank">View Projects</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- Contact & Footer -->
  <footer class="footer mt-5">
    <div class="container text-center">
      <p>&copy; <?php echo date("Y"); ?> Student Disciplinary System - Ahman Pategi University</p>
      <p>Developed by <a href="https://we-solve-it.netlify.app/" class='text-warning' target="_blank">ONIYE ABDULLAHI MASUD (21/02/SE/2/001) SOFTWARE ENGINEERING DEPEARTMENT</a></p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/c5355fa9b1.js" crossorigin="anonymous"></script>
</body>
</html>
