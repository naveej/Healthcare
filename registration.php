<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];

    // validate form data
    $errors = array();
    if (empty($firstName)) {
        $errors["firstName"] = "firstName is required.";
    }
    if (empty($lastName)) {
        $errors["lastName"] = "lastName is required.";
    }
    if (empty($email)) {
        $errors["email"] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
    }
    if (empty($password)) {
        $errors["password"] = "Password is required.";
    }
    if (empty($mobile)) {
        $mobile["password"] = "Password is required.";
    }

    if (count($errors) > 0) {
        // return error response
        echo json_encode(array("success" => false, "errors" => $errors));
    } else {
        // save user to database
        $servername = "localhost";
        $usernamesql = "root";
        $dbName = "healthconnect";

        $conn = mysqli_connect($servername, $usernamesql, '', $dbName);
        if ($conn->connect_error) {
            echo json_encode("failed");
            die("Connection failed: " . $conn->connect_error);
        } else {
            // return success response
            $sql = "INSERT INTO users (firstName,lastName,mobile,email,password) VALUES('$firstName','$lastName','$mobile','$email','$password')";

            if (mysqli_query($conn, $sql)) {
                echo json_encode("success");
            } else {
                echo json_encode("Some Error occured couldn't register");
            }
        }
    }
}
