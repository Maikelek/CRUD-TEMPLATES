<?php
session_start();
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
    <title>CREATE</title>
</head>
<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container">
                <a href="https://github.com/maikelek" class="navbar-brand">Maikelek</a>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="create.php" class="nav-link active">CREATE</a>
                    </li>
                    <li class="nav-item">
                        <a href="read.php" class="nav-link">READ</a>
                    </li>
                </ul>
            </div>
        </nav>

    <div class="container mt-4">

        <div class="card card shadow p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <h2 class="card-title">CREATE</h2>
                <div class="card-text mt-3">
                    Here you can add users to your SQL database. Just fill the inputs with informations needed and press submit
                </div>
            </div>
        </div>

        <?php include('./components/alert.php')?>
        <div class="card">
            <form action="../backend/add.php" method="POST">
                <div class="p-3">
                    <label for="fname" class="form-label">First name</label>
                    <input type="text" class="form-control" name="fname">
                    <div class="form-text">Fill your first name.</div>
                </div>
                <div class="p-3">
                    <label for="lname" class="form-label">Last name</label>
                    <input type="text" class="form-control" name="lname">
                    <div class="form-text">Fill your last name.</div>
                </div>
                <div class="p-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email">
                    <div class="form-text">Fill your email.</div>
                </div>
                <div class="p-3">
                    <label for="fname" class="form-label">Age</label>
                    <input type="number" class="form-control" name="age">
                    <div class="form-text">Fill your age.</div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" name="add" class="btn btn-success mb-5">Create user</button>
                </div>
            </form>
        </div>
    
</body>
</html>