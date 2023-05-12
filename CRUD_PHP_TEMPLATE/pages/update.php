<?php
require '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>UPDATE</title>
</head>
<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container">
                <a href="https://github.com/maikelek" class="navbar-brand">Maikelek</a>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="create.php" class="nav-link">CREATE</a>
                    </li>
                    <li class="nav-item">
                        <a href="read.php" class="nav-link">READ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active">UPDATE</a>
                    </li>
                </ul>
            </div>
        </nav>

    <div class="container mt-4">

        <div class="card card shadow p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <h2 class="card-title">UPDATE</h2>
                <div class="card-text mt-3">
                    Here you can update users from your database.
                </div>
            </div>
        </div>

        <?php include('./components/alert.php')?>
        <div class="card">

            <?php 
                if(isset($_GET['id'])) {
                    $fetchUserID = mysqli_real_escape_string($conn, $_GET['id']);
                    $query = "SELECT * FROM users WHERE id='$fetchUserID'";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0){
                        $data = mysqli_fetch_array($result);
                        ?>
                        <form action="../backend/edit.php" method="POST">

                            <div class="p-3">
                                <label class="form-label">First name</label>
                                <input type="text" name="fname" value="<?=$data['fname'];?>" class="form-control">
                            </div>
                            <div class="p-3">
                                <label class="form-label">Last name</label>
                                <input type="text" name="lname" value="<?=$data['lname'];?>" class="form-control">
                            </div>
                            <div class="p-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" value="<?=$data['email'];?>" class="form-control">
                            </div>
                            <div class="p-3">
                                <label class="form-label">Age</label>
                                <input type="number" name="age" value="<?=$data['age'];?>" class="form-control">
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" name="edit" class="btn btn-success mb-5">UPDATE USER</button>
                            </div>
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                        </form>
                        <?php
                    }
            else{
                echo '<p class="alert alert-danger p-3 m-3">That ID does not exist in your database<p>';
            }
    }
                ?>
        </div>
    
</body>
</html>