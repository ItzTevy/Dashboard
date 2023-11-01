<?php
session_start();
$username = $_SESSION["username"];
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$avatarUrl = "https://mc-heads.net/avatar/" . urlencode($username) . "/45.png";

?>

<?php
$servername = "89.168.102.184";
$username = "u3_NwHzFKfROn";
$password = "Yh2@2JZRMdC^C6CI4DW@nzS5";
$dbname = "s3_superbvote";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("RIP " . $conn->connect_error);
}

$query = "SELECT * FROM vote";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalVotes = $row["total_votes"];
} else {
    $totalVotes = 0;
}

$conn->close();
?>

<?php
$servername = "89.168.102.184";
$username = "u3_JEvZQJFQNV";
$password = "k6XxtBi!51V=g1rf@WQxO8c@";
$dbname = "s3_litebans";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$totalSanctions = 0;

$bansQuery = "SELECT * FROM litebans_bans";
$bansResult = $conn->query($bansQuery);
if ($bansResult->num_rows > 0) {
    $totalSanctions += $bansResult->num_rows;
}

$kicksQuery = "SELECT * FROM litebans_kicks";
$kicksResult = $conn->query($kicksQuery);
if ($kicksResult->num_rows > 0) {
    $totalSanctions += $kicksResult->num_rows;
}

$mutesQuery = "SELECT * FROM litebans_mutes";
$mutesResult = $conn->query($mutesQuery);
if ($mutesResult->num_rows > 0) {
    $totalSanctions += $mutesResult->num_rows;
}

$warningsQuery = "SELECT * FROM litebans_warnings";
$warningsResult = $conn->query($warningsQuery);
if ($warningsResult->num_rows > 0) {
    $totalSanctions += $warningsResult->num_rows;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta property="og:title" content="DashBoard - SyncSources">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://dash.syncsources.ro">
  <meta property="og:image" content="../assets/img/logo.png">
  <meta property="og:description" content="Your new generation of DashBoards">
  <title>Dashboard - SyncSources </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/index.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SyncSources
  * Updated: Oct 26 2023 with Bootstrap v5.3.2
  * Author: SyncSources.org
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="../index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">SyncSources</span>
      </a>
      <i class="bi bi-record-circle toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= $avatarUrl ?>" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['username']; ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="../php/logout.php">
              <i class="bi bi-box-arrow-down-left"></i>
                <span>Log-out</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
       <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Home</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../home/staff.php">
              <i class="bi bi-circle"></i><span>Staff</span>
            </a>
          </li>
          <li>
            <a href="../home/donors.php">
              <i class="bi bi-circle"></i><span>Donors</span>
            </a>
          </li>
          <li>
            <a href="../home/server.php">
              <i class="bi bi-circle"></i><span>Server</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Links</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="https://syncsources.org">
              <i class="bi bi-circle"></i><span>Home</span>
            </a>
          </li>
          <li>
            <a href="https://syncsources.org/discord">
              <i class="bi bi-circle"></i><span>Discord</span>
            </a>
          </li>
          <li>
            <a href="https://syncsources.org/store">
              <i class="bi bi-circle"></i><span>Store</span>
            </a>
          </li>
          <li>
            <a href="https://syncsources.org/vote">
              <i class="bi bi-circle"></i><span>Vote</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Account</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../php/logout.php">
              <i class="bi bi-circle"></i><span>Log-In</span>
            </a>
          </li>
          <li>
            <a href="../php/logout.php">
              <i class="bi bi-circle"></i><span>Sign-Out</span>
            </a>
          </li>
          <li>
            <a href="../register.php">
              <i class="bi bi-circle"></i><span>Register</span>
            </a>
          </li>
          <li>
            <a href="../changepassword.php">
              <i class="bi bi-circle"></i><span>Change-Password</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>

  </aside>


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Home</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <section class="section dashboard">
      <div class="row">

<div class="row">
    <div class="col-md-12">
        <div class="card info-card sales-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                <h5 class="card-title">Players <span>| Now</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>Online <span data-playercounter-ip="play.syncnetwork.ro">0</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
           <h5 class="card-title">Sanctions <span>| Total</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-ban"></i>
                </div>
                <div class="ps-3">
                    <h6>Sanctions <span><?php echo $totalSanctions; ?></span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
            <h5 class="card-title">Votes <span>| Total</span></h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-broadcast"></i>
                </div>
                <div class="ps-3">
                    <h6>Votes <span><?php echo $totalVotes; ?></span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
		  </div>
            <div class="col-12">
              <div class="card">
                         <div class="card-body">
                      <h5 class="card-title">Online Players</h5>
          
                      <div id="playerCountChart"></div>
                  </div>
                </div>
            </div>
         </div>
    </section>

  </main>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SyncSources</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Made by <a href="https://SyncSources.org/">SyncSources Production</a>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="https://cdn.jsdelivr.net/gh/leonardosnt/mc-player-counter/dist/mc-player-counter.min.js"></script>  

  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script> 

  <script>
    function toggleSubMenu(subcategoryId) {
        var subcategory = document.getElementById(subcategoryId);
        if (subcategory) {
            subcategory.classList.toggle("show");
        }
    }
</script>

<script>
    if (resourceNotFound) {
        window.location.href = '/error.html';
    }
</script>

<script>
  function getAvatar(playerName) {
    const apiUrl = `https://api.minotar.net/avatar/${playerName}?size=100&format=png`;

    const avatarImg = document.getElementById('minecraftAvatar');
    avatarImg.src = apiUrl;
  }
</script>

<script>
                          document.addEventListener("DOMContentLoaded", () => {
                              const playerCountElements = document.querySelectorAll('h6 span[data-playercounter-ip]');
                              const playerCountData = Array.from(playerCountElements).map(element => parseInt(element.textContent));
          
                              const startDate = new Date('2023-10-01');
                              const endDate = new Date('2023-10-30');
                              const dateLabels = [];
                              
                              let currentDate = new Date(startDate);
                              while (currentDate <= endDate) {
                                  dateLabels.push(currentDate.toISOString().split('T')[0]);
                                  currentDate.setDate(currentDate.getDate() + 1);
                              }
          
                              new ApexCharts(document.querySelector("#playerCountChart"), {
                                  series: [{
                                      name: 'Players',
                                      data: playerCountData,
                                  }],
                                  chart: {
                                      height: 350,
                                      type: 'line',
                                      toolbar: {
                                          show: false
                                      },
                                  },
                                  markers: {
                                      size: 4
                                  },
                                  dataLabels: {
                                      enabled: true
                                  },
                                  stroke: {
                                      curve: 'smooth',
                                      width: 2
                                  },
                                  xaxis: {
                                      type: 'datetime',
                                      categories: dateLabels,
                                  },
                                  tooltip: {
                                      x: {
                                          format: 'dd/MM/yy',
                                      },
                                  }
                              }).render();
                            });
                      </script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const filterButtons = document.getElementById("filter-buttons");
    const filteredData = document.getElementById("filtered-data");

    filterButtons.addEventListener("click", async function(event) {
        if (event.target.tagName === "BUTTON") {
            const filter = event.target.id.replace("filter-", "");
            const response = await fetch(`data.php?filter=${filter}`);
            const data = await response.json();

            const html = data.map(item => `<div>${item.date} - ${item.value}</div>`).join("");
            filteredData.innerHTML = html;
        }
    });
});
</script>

<script>
  function updatePlayerCount() {
    const playerCountElement = document.getElementById('player-count');
    const ipAddress = playerCountElement.getAttribute('data-playercounter-ip');
    
    const currentCount = parseInt(playerCountElement.innerText, 10);
    const newCount = currentCount + 1;
    
    playerCountElement.innerText = newCount;
  }

  setInterval(updatePlayerCount, 15000);
</script>

    <script>
        function showAvatar() {
            const username = document.getElementById('username').value;
            const avatarUrl = `https://mc-heads.net/avatar/${encodeURIComponent(username)}/45.png`;

            const avatarElement = document.getElementById('avatar');
            avatarElement.innerHTML = `<img src="${avatarUrl}" alt="${username}'s Minecraft Avatar">`;

            return false;
        }
    </script>

</body>

</html>

<style>
.card {
  background-color: #312d66;
  margin-bottom: 50px;
  border: none;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(196, 187, 206, 0.8);
}
</style>