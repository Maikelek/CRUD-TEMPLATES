<?php

require '../config/config.php';

if(isset($_POST['edit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);

    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', age='$age' WHERE id='$id' ";
    $result = mysqli_query($conn, $query);



    if ($result) {

        header("Location: ../pages/read.php");
        exit(0);
    } else {
        header("Location: ../pages/read.php");
        exit(0);
    }
}


?>