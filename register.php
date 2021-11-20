<?php
   /// REGISTRATION 
   require_once "./config/database.php";
   include_once "usersInc.php";




   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Register</title>
</head>

<body style="background-color: #0F10426B;">

    <section id="register">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 bg-white login-column mx-auto mt-5">
                    <!-- LOGIN FORM -->
                    <h2 class="text-center">Register Form</h2>

                    <form action="register.php" class="login-form py-5" method="POST">
                        <div class="form-group">
                            <label for="password">Name  <span class="text-danger"></span></label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="password">Unverisity</label>
                            <select class="form-control" name="university">
                                <?php 
                                    require_once './config/database.php';
                                    $sql = "SELECT * FROM `universities`";

                                    $result = $mysqli->query($sql);
                                    if($result->num_rows > 0) {
                                        while($row = $result->fetch_array()) {
                                            $uni_id = $row['uni_id'];
                                            $uni_name = $row['uni_name'];
                                    ?>
                                            <option value=<?php echo $uni_id ?>><?php echo $uni_name ?></option>
                                    <?php

                                        }
                                    }
                                ?>
                              </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger"></span></label>
                            <input type="text" class="form-control" placeholder="Enter Email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password  <span class="text-danger"></span></label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-block px-3">Register</button>
                    </form>
                    <p class="lead text-center">If you're old, <a href="login.php">click here</a> to login</p>
                    
                </div>
            </div>
        </div>
    </section>



    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/style.js"></script>
</body>

</html>