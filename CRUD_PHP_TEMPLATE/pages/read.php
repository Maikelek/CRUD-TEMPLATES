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
    <title>READ</title>
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
                        <a href="read.php" class="nav-link active">READ</a>
                    </li>
                </ul>
            </div>
        </nav>

    <div class="container mt-4">

        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <h2 class="card-title">READ</h2>
                <div class="card-text mt-3">
                    Here you can see all your database records you have created in "create.php"
                </div>
            </div>
        </div>

        <table class="table table-striped table-hover mt-5 shadow p-3 mb-5 bg-body rounded">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FNAME</th>
                    <th>LNAME</th>
                    <th>EMAIL</th>
                    <th>AGE</th>
                    <th>UPDATE/DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0)
                    {
                        foreach($result as $data)
                        {
                            ?>
                            <tr>
                                <td><?= $data['id']; ?></td>
                                <td><?= $data['fname']; ?></td>
                                <td><?= $data['lname']; ?></td>
                                <td><?= $data['email']; ?></td>
                                <td><?= $data['age']; ?></td>
                                <td>

                                    <form action="../backend/remove.php" method="POST" class="d-inline">
                                        <button type="submit"  value="<?=$data['id'];?>" class="btn btn-danger" name="remove">Delete</button>
                                    </form>
                                    <a href="update.php?id=<?= $data['id']; ?>" class="btn btn-info">Edit</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo '<p class="alert alert-danger mt-1"> There are no users in your database <p>';
                    }
                ?>
            </tbody>
        </table>

    </div>
    
</body>
</html>