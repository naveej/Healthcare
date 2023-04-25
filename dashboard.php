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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/root.css">
  <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
  <div class="rec__container">
  <div class="search__container">
    <form action="">
    <i class='bx bx-search-alt search__btn'></i>
      <input class="search__input" type="text" name="" id="" placeholder="Enter your todays intake...">
    </form>
</div>
<div class="result__container">
  
</div>

  </div>
</body>
</html>