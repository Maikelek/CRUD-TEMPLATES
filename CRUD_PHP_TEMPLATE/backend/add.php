<?php

session_start();
require '../config/config.php';

if(isset($_POST['add'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);

    $query = "INSERT INTO users ( fname, lname, email, age) VALUES ('$fname', '$lname', '$email', '$age')";
    $result = mysqli_query($conn, $query);



    if ($result) {
        $_SESSION['message'] = "You have created a user";
        header("Location: ../pages/create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "User was not created! Try again";
        header("Location: ../pages/create.php");
        exit(0);
    }
}


?>