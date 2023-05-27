<?php
session_start();
if (isset($_SESSION['loggedin'])) {
} else {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="css/root.css">
  <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
  <section class="rec__container">
    <button id="logoutbtn" class="logout__btn search__btn"><i class='bx bx-log-out'></i> Logout</button>
    <div class="search__container">
      <form action="" id="food-form">
        <button class="search__btn" type="submit">
          <i class='bx bxs-right-arrow-alt search__icon'></i>
        </button>
        <input id="food-input" autocomplete="off" class="search__input" type="text" name="" id="" placeholder="Enter your todays intake...">

      </form>
    </div>
    <div class="result__container zero__size">
      <div class="nutrient__results hidden" id="nutrient-results">
        <h2>hello</h2>
      </div>
      <div class="recommendations hidden" id="recommendations">
        <h2>Recommended Recipes</h2>
        <div class="result" id="result"></div>
        <div class="food__container" id="meal"></div>
      </div>

    </div>

  </section>
  <script src="js/dashboard.js"></script>
</body>

</html>