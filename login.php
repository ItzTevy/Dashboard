<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - SyncSources</title>
  <meta property="og:title" content="DashBoard - SyncSources">
  <meta property="og:type" content="website">
 	<meta property="og:url" content="https://dash.syncsources.ro">
  <meta property="og:image" content="../assets/img/logo.png">
 	<meta property="og:description" content="Your new generation of DashBoards">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SyncSources
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://SyncSources.com/nice-admin-bootstrap-admin-html-template/
  * Author: SyncSources.com
  * License: https://SyncSources.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="../index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">SyncSources</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate method="post" action="/php/login.php">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://SyncSources.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://SyncSources.com/nice-admin-bootstrap-admin-html-template/ -->
                Made by <a href="https://SyncSources.com/">SyncSources</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


<?php
// Connect to your database
$servername = "localhost"; // Your MySQL server address
$username = "dashboard"; // Your MySQL username
$password = "fj2t$3R31"; // Your MySQL password
$databaseName = "dash"; // Your database name

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $databaseName);

$_SESSION['username'] = $username; // Set the username in the session

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // You should perform validation and sanitization on user input here

    // Check if the username exists
    $check_query = "SELECT * FROM dash WHERE username = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($stmt->execute()) {
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            // Username exists, proceed with authentication
            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];
    
            if (password_verify($password, $storedPassword)) {
                // Password is correct, set user session and redirect to the profile page
                session_start();
                $_SESSION['username'] = $username; // Set the username in the session
                $_SESSION['user_id'] = $row['id']; // Set the user ID in the session
    
                header("Location: ../../index.php"); // Redirect to the profile page
                exit;
            } else {
                // Password is incorrect, display an error message
                echo "Incorrect password. Please try again.";
            }
        } else {
            // Username does not exist
            header("Location: ../notfounduser.php");
        }
    } else {
        // Database error, handle it as needed
        echo "Database error. Please try again later.";
    }
    

    $stmt->close();
}

$conn->close();
?>