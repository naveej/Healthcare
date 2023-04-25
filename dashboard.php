<?php
  session_start();
  if (isset($_SESSION['loggedin'])) {
    
}else {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Rahul J @ rahuljmusic99@gmail.com" />
    <meta
      name="description"
      content="This is a website to demo the Responsive Navigation Bar"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/root.css" />
    <link rel="stylesheet" href="css/dashboard.css" />
    <title>Responsive Nav Bar</title>
  </head>
  <body>
    <!-- Nav Bar Container -->
    <section class="header">
      <nav class="nav-container" role="navigation">
        <!-- logo content -->
        <div class="logo-content">
          <div class="logo">
            <i class="bx bxl-nodejs"></i>
            <h1>Coding</h1>
          </div>
          <i class="bx bx-menu" id="menu-btn"></i>
        </div>

        <!-- navigation list -->
        <ul role="list" class="nav-list">
          <li>
            <i class="bx bx-search"></i>
            <input type="text" class="search-bar" placeholder="Search..." />
            <span class="tooltip" role="tooltip">Search</span>
          </li>
          <li>
            <a href="#">
              <i class="bx bxs-dashboard"></i>
              <span class="links-name">Dashboard</span>
            </a>
            <span class="tooltip" role="tooltip">Dashboard</span>
          </li>
          <li>
            <a href="#">
              <i class="bx bxs-user"></i>
              <span class="links-name">User</span>
            </a>
            <span class="tooltip" role="tooltip">User</span>
          </li>
          <li class="dropdown">
            <a href="#">
              <i class="bx bxs-chat"></i>
              <span class="links-name">Message</span>
              <i class='bx bx-chevron-down'></i>
            </a>
            <div class="dropdown-content">
              <a href="#">
                <i class='bx bx-star'></i>
                <span class="links-name">Starred</span>
              </a>
              <a href="#">
                <i class='bx bx-archive-in'></i>
                <span class="links-name">Archived</span>
              </a>
              <a href="#">
                <i class='bx bx-no-entry'></i>
                <span class="links-name">Spam</span>
              </a>
            </div>
            <span class="tooltip" role="tooltip">Message</span>
          </li>
          <li>
            <a href="#">
              <i class="bx bxs-pie-chart"></i>
              <span class="links-name">Analytics</span>
            </a>
            <span class="tooltip" role="tooltip">Analytics</span>
          </li>
          <li>
            <a href="#">
              <i class="bx bxs-folder-open"></i>
              <span class="links-name">File Manager</span>
            </a>
            <span class="tooltip" role="tooltip">File Manager</span>
          </li>
          <li>
            <a href="#">
              <i class="bx bxs-cart-alt"></i>
              <span class="links-name">Order</span>
            </a>
            <span class="tooltip" role="tooltip">Order</span>
          </li>
          <li>
            <a href="#">
              <i class="bx bxs-book-heart"></i>
              <span class="links-name">Saved</span>
            </a>
            <span class="tooltip" role="tooltip">Saved</span>
          </li>
          <li>
            <a href="#">
              <i class="bx bxs-cog"></i>
              <span class="links-name">Settings</span>
            </a>
            <span class="tooltip" role="tooltip">Settings</span>
          </li>
        </ul>

        <div class="profile-container">
          <div class="profile">
            <img src="images/profile.jpeg" alt="" />
            <h3>
              <span class="name">Rahul J</span>
              <span class="job">Programmer</span>
            </h3>
          </div>
          <i class="bx bx-log-out" title="logout"></i>
          <span class="tooltip" role="tooltip">Logout</span>
        </div>
      </nav>
    </section>


    <section class="main">
      <h1>Main Content</h1>
    </section>

    <!-- * Javascript Link -->
    <script src="main.js"></script>
  </body>
</html>
