<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" href="path/to/your/favicon.ico" type="image/x-icon">

  <style>
    body {
      margin-left: 0;
      transition: margin-left 0.3s;
    }

    .sidebar-container {
      display: flex;
      position: relative;
    }

    .sidebar a:hover {
      /* Remove hover styles for the <a> tag containing the logo */
      background-color: transparent;
    }

    .sidebar {
      height: 100%;
      width: 270px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #FFFFFF;
      overflow-x: hidden;
      padding-top: 20px;
      z-index: 1000;
      transition: width 0.3s;
    }

    .content {
      margin-left: 270px;
      transition: margin-left 0.3s;
    }

    .navbar {
      background-color: #FFFFFF;
      width: 100%;
      position: fixed;
      top: 0;
      z-index: 1000;
    }


    .navbar a img {
      pointer-events: none;
      cursor: default;
    }

    .navbar .navbar-toggler {
      border: none;
      outline: none;
      cursor: pointer;
    }

    .navbar .navbar-nav {
      list-style: none;
      display: flex;
      align-items: center;
    }

    .navbar .nav-item {
      margin: 10 10px;
    }

    .navbar .nav-link {
      text-decoration: none;
      font-weight: bold;
      font-size: 20px;
      transition: color 0.3s;
      background-color: transparent;
    }

    .navbar .nav-link:hover {
      color: #04AA6D;
      background-color: transparent;
    }

    .user-info {
      display: flex;
      align-items: center;
      flex-direction: column;
      margin-right: 10px;
      margin-bottom: 40px;
    }

    .user-info img {
      width: 110px;
      height: 150px;
      border-radius: 50%;
      margin-bottom: 15px;
      transition: opacity 0.3s;
    }

    .user-info .user-name {
      color: #000;
      font-size: 16px;
    }

    .custom-buttons a {
      text-decoration: none;
      color: black;
      font-weight: bold;
      font-size: 16px;
      margin-bottom: 20px;
      position: relative;
      opacity: 1;
      transition: opacity 0.3s;
    }

    .custom-buttons a img {
      width: 15px;
      height: 15px;
      margin-right: 10px;
      filter: grayscale(0%);
    }

    .custom-buttons a.active {
      color: teal;
      background-color: lightgray;
      /* Add a background color for hover and active states */
      width: 92%;
      border-radius: 0px;
    }

    .custom-buttons a:hover {
      color: teal;
      background-color: transparent;
    }


    .toggle-btn {
      width: 40px;
      height: 40px;
      background-color: white;
      border-radius: 10px;
      color: black;
      border: none;
      cursor: pointer;
      margin-left: 15px;
      position: fixed;
      top: 20px;
      left: 20px;
      z-index: 1001;
      font-size: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: left 0.3s;
    }

    .sidebar[style*="width:0"] {
      overflow: hidden;
    }

    .sidebar[style*="width:0"] .custom-buttons a span {
      display: none;
    }

    .sidebar[style*="width:0"] .custom-buttons a img {
      margin-right: 0;
      /* Adjusted to keep the icons aligned */
      margin-left: 10px;
      /* Add margin to separate icons */
    }
  </style>
</head>

<body onload="toggleSidebar()">

  <?php
  // Set $currentPage based on your logic to determine the current page

  $currentURL = $_SERVER['REQUEST_URI'];

  // Use strpos to check if the current URL contains a specific string for each page
  if (strpos($currentURL, 'lecturer_menu.php') !== false) {
    $currentPage = 'dashboard';
  } elseif (strpos($currentURL, 'review_student_admin.php') !== false) {
    $currentPage = 'review';
  } elseif (strpos($currentURL, 'admin_student_details.php') !== false) {
    $currentPage = 'review';
  } elseif (strpos($currentURL, 'admin_report.php') !== false) {
    $currentPage = 'report';
  } elseif (strpos($currentURL, 'event_data.php') !== false) {
    $currentPage = 'report';
  } elseif (strpos($currentURL, 'personal_data.php') !== false) {
    $currentPage = 'report';
  } elseif (strpos($currentURL, 'medical_data.php') !== false) {
    $currentPage = 'report';
  } elseif (strpos($currentURL, 'logout.php') !== false) {
    $currentPage = 'logout';
  } else {
    // Default to some page (e.g., dashboard) if no match is found
    $currentPage = 'dashboard';
  }
  ?>

  <div class="sidebar-container">
    <div class="sidebar" id="sidebar">
      <ul class="navbar-nav">
        <a href="javascript:void(0)" onclick="toggleSidebar()">
          <img class="img" id="logo" style="width: 90%" src="pictures/vertical_logo.jpg" alt="Logo">
        </a>
        <li class="nav-item nav-link">
          <div class="user-info">

            <span class="user-name" id="name"><?php echo $name; ?></span>
          </div>
        </li>

        <li class="nav-item nav-link">
          <div class="custom-buttons">

            <a id="dashboardLink" href="admin_menu.php" class="nav-link <?php echo ($currentPage === 'dashboard') ? 'active' : ''; ?> <?php echo ($currentPage === 'dashboard') ? 'active-page' : ''; ?>" style="font-size: 14px; font-weight: 500; justify-content: center; margin-left: 10px">
              <img style="width: 15px; height: 15px; color: gray " src="pictures/dashboard.png" alt="Menu Icon">
              <span>Dashboard</span>
            </a>

            <a id="reviewLink" href="review_student_admin.php" class="nav-link <?php echo ($currentPage === 'review') ? 'active' : ''; ?> <?php echo ($currentPage === 'review') ? 'active-page' : ''; ?>" style="font-size: 14px;font-weight: 500; justify-content: center;margin-left: 10px">
              <img style="width: 15px; height: 15px; color: gray " src="pictures/history.png" alt="Menu Icon">
              <span>Overview</span>
            </a>



            <a id="reportLink" href="admin_report.php" class="nav-link <?php echo ($currentPage === 'report') ? 'active' : ''; ?> <?php echo ($currentPage === 'report') ? 'active-page' : ''; ?>" style="font-size: 14px; font-weight: 500; justify-content: center; margin-left: 10px ">
              <img style="width: 15px; height: 15px; color: gray " src="pictures/chart.png" alt="Menu Icon">
              <span>Generate Report</span>
            </a>

            <div>

              <a id="reportLink" href="logout.php" class="nav-link <?php echo ($currentPage === 'logout') ? 'active' : ''; ?> <?php echo ($currentPage === 'logout') ? 'active-page' : ''; ?>" style="font-size: 14px; font-weight: 500; justify-content: center; margin-left: 30px; margin-top: 400px ">
                <img style="width: 20px; height: 20px; color: gray " src="pictures/logout.png" alt="Menu Icon">
                <span>LOGOUT</span>



                <!--  <button class="logout-button btn btn-secondary" style="background-color: white; color: black;border-radius: 10px; margin-top: 130%" onclick="window.location.href='logout.php'">LOGOUT</button> -->
              </a>



            </div>
          </div>
        </li>
      </ul>
    </div>

    <div class="toggle-btn" onclick="toggleSidebar()">☰</div>

    <div class="content" id="main-content">
      <!-- The rest of your content goes here -->
    </div>
  </div>

  <script>
    function toggleSidebar() {
      var sidebar = document.getElementById("sidebar");
      var body = document.body;
      var toggleBtn = document.querySelector(".toggle-btn");
      var dashboardLink = document.getElementById("dashboardLink");
      var reviewLink = document.getElementById("reviewLink");
      var reportLink = document.getElementById("reportLink");
      var userImage = document.getElementById("userImage");
      var logo = document.getElementById('logo');
      var userName = document.getElementById("name");

      // Check if the current page is "admin_report.php"
      var isReportPage = window.location.pathname.includes('admin_report.php');

      if (sidebar.style.width === "270px") {
        // Reduce the width of the sidebar to leave space for icons
        sidebar.style.width = "80px";
        body.style.marginLeft = "80px";
        toggleBtn.style.left = "80px";

        // Set the visibility of text to hidden when the sidebar is closed
        dashboardLink.querySelector("span").style.visibility = "hidden";
        dashboardLink.style.marginBottom = "50px";
        reviewLink.querySelector("span").style.visibility = "hidden";
        reportLink.querySelector("span").style.visibility = "hidden";
        reportLink.style.marginBottom = "-30px";
        userName.style.visibility = "hidden";
        userImage.style.visibility = "hidden";

        // Additional adjustments for "admin_report.php" page
        if (isReportPage) {
          // Add specific adjustments for the "admin_report.php" page
          // (you can customize these based on your design)
          reportLink.style.marginBottom = "10px";
          // Add more adjustments as needed
        }

      } else {
        // Expand the width of the sidebar
        sidebar.style.width = "270px";
        body.style.marginLeft = "270px";
        toggleBtn.style.left = "270px";

        // Set the visibility of text to visible when the sidebar is open
        dashboardLink.querySelector("span").style.visibility = "visible";
        reviewLink.querySelector("span").style.visibility = "visible";
        reportLink.querySelector("span").style.visibility = "visible";
        reportLink.style.marginBottom = "";
        userName.style.visibility = "visible";
        userImage.style.visibility = "visible";
        logo.style.visibility = "visible";

        // Additional adjustments for "admin_report.php" page
        if (isReportPage) {
          // Add specific adjustments for the "admin_report.php" page
          // (you can customize these based on your design)
          reportLink.style.marginBottom = "";
          // Add more adjustments as needed
        }
      }
    }
  </script>

</body>

</html>