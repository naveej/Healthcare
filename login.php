<?php

// start the session
session_start();

// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get the form data
  $username = $_POST['username'];
  $password = $_POST['password'];

  // validate the form data
  if (empty($username) || empty($password)) {
    // return an error message if any field is empty
    $response = 'Please fill in all fields';
    echo json_encode($response);
  } else {
    // connect to database
    $servername = "localhost";
    $usernamesql = "root";
    $dbName = "healthconnect";
    $dbPassword = "Rahul@123";

    $conn = mysqli_connect($servername, $usernamesql, '$dbPassword', $dbName);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // check the username and password against the database
    $sql = "SELECT * FROM users WHERE email='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) >= 1) {
      // the login is successful, set session variables and return success message
      $_SESSION['username'] = $username;
      $_SESSION['loggedin'] = true;
      $response = "success";
      echo json_encode($response);
    } else {
      // the login failed, return error message
      $response = "invalid user name or password...!";
      echo json_encode($response);
    }
  }
}
