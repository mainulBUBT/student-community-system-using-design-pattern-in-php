<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
</head>

<?php
session_start();
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    header("Location: index.php");
    exit;
}

?>

<?php
require_once "./config/database.php";

include 'usersInc.php';





?>


<body style="background-color: #0F10426B;">

    <section id="login">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12 col-lg-4 bg-white login-column">
                    
                    <h2 class="text-center">Login Form</h2>

                    <form action="login.php" class="login-form" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-block float-center px-3">Login</button>
                    </form>
                    <p class="lead text-center">If you're new, <a href="register.php">click here</a> to register</p>
                </div>

                <div class="d-none d-lg-block col-lg-8 image-column">
                   
                    <div class="image-sec">
                        <div class="overlay text-white">
                            <div class="container h-100">
                                <div class="row h-100">
                                    <div class="col-md-12 my-auto ml-5">
                                        <h3 class="display-4">Welcome, Dear student.</h3>
                                        <p class="lead">To get a fresh start of your day, login to the system.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/style.js"></script>
</body>

</html>