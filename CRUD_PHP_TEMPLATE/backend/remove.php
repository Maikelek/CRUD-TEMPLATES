<?php

require '../config/config.php';

if(isset($_POST['remove']))
{
    $id = mysqli_real_escape_string($conn, $_POST['remove']);

    $query = "DELETE FROM users WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header("Location: ../pages/read.php");
        exit(0);
    }
    else
    {
        header("Location: ../pages/read.php");
        exit(0);
    }
}