<?php include './includes/header.php' ?>
<?php include './config/database.php'; ?>
<?php
	if(!isset($_SESSION['loggedIn']) && $_SESSION["loggedIn"] != true) {
		header("Location: login.php");
		exit;
	}

?>
</head>

<?php
    if(isset($_GET['user'])) {
        
        $user_id = $_GET['user'];

        $query = "SELECT *, 
                (SELECT COUNT(feeds.feed_id) FROM feeds WHERE feeds.feed_user_id = users.user_id) AS totalFeed,
                (SELECT COUNT(posts.post_id) FROM posts WHERE posts.post_user_id = users.user_id) AS totalPost,
                (SELECT universities.uni_name FROM universities WHERE universities.uni_id = users.user_uni_id) AS university_name
                FROM users WHERE users.user_id = $user_id ";
        $result = $mysqli->query($query);
        if($result->num_rows == 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $user_name =  $row['user_name'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
            $user_image = $row['user_image'];
            $user_about_me = $row['user_about_me'];

            $total_feed = $row['totalFeed'];
            $total_post = $row['totalPost'];
            $university_name = $row['university_name'];

        } else {
            echo 'no user found';
        }

    } else {
        // header('Location: index.php');
    }


?>





<body>

<?php include './includes/navbar.php' ?>

    <section id="head" class="p-3">
        <div class="container-fluid">
            <div class="row">

                
                <div class="col-md-8">
                     
                        <div class="card profile-header">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-12">
                                        <div class="profile-image float-md-right text-center">
                                            <img src="img/<?php echo $user_image ?>" class="mb-3" alt="" class=""><br>
                                            <?php 
                                                if($user_id == $_SESSION['user_id']) {
                                                    echo '<button class="btn btn-primary btn-round btn-sm" type="button" data-toggle="modal" data-target="#editProfileImageModal"><i class="fa fa-plus"> Edit Image</i></button>';
                                                    include './includes/editProfileImageModal.php';
                                                }
                                            ?>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-12">
                                        <h4 class="m-t-0 m-b-0"><strong><?php echo $user_name ?></strong></h4>
                                        <span class="job_post"><?php echo $university_name?></span>
                                         <p class="job_post"> <?php echo $user_about_me?></span></p> 
                                        <div class="mt-4">
                                            <?php
                                            if($user_id == $_SESSION['user_id']) {
                                                echo '<button class="btn btn-primary btn-round" type="button" data-toggle="modal" data-target="#editProfileModal">Edit Profile</button>';
                                                include './includes/editProfileModal.php';
                                            } else {
                                                echo '<button class="btn btn-primary btn-round"><i class="fa fa-plus"> Follow</i></button>';
                                            }
                                            ?>
                                            


                                            
                                        </div>

                                        <p class="m-t-5 m-b-0 pt-2">
                                            
                                            <?php
                                                $get_contacts = "SELECT * from contacts where user_id = $user_id";
                                                if($contacts = $mysqli->query($get_contacts)) {
                                                    if($contacts->num_rows == 1 ) {
                                                        $row = $contacts->fetch_array(MYSQLI_ASSOC);
                                                        $twitter_link = $row['twitter'];
                                                        $facebook_link = $row['facebook'];
                                                        $google_link = $row['google'];
                                                        $instagram_link = $row['instagram'];
                                                    } else {
                                                        $set_contacts = "INSERT INTO contacts (user_id) VALUES ($user_id)";
                                                        if($mysqli->query($set_contacts)) {
                                                            $twitter_link = '';
                                                            $facebook_link = '';
                                                            $google_link = '';
                                                            $instagram_link = '';
                                                        } else {
                                                            echo "error: " . $mysqli->error;
                                                        }
                                                    }
                                                }
                                            ?>
                                            
                                            <a class="<?php echo empty($twitter_link) ? 'd-none' : '' ?>" title="Twitter" href="https://twitter.com/<?php echo $twitter_link ?>" target="_blank"><i class="fa fa-twitter" class= "icon"></i></a>

                                            <a class="<?php echo empty($facebook_link) ? 'd-none' : '' ?>" title="Facebook" href="https://www.facebook.com/<?php echo $facebook_link ?>" target="_blank"><i class="fa fa-facebook" class= "icon" ></i></a>

                                            <a class="<?php echo empty($google_link) ? 'd-none' : '' ?>" title="Google-plus" href="mailto:<?php echo $google_link ?>" target="_blank"><i class="fa fa-google" class= "icon"></i></a>

                                            <a class="<?php echo empty($instagram_link) ? 'd-none' : '' ?>" title="Instagram" href="https://www.instagram.com/<?php echo $instagram_link ?>" target="_blank"><i class="fa fa-instagram " class= "icon"></i></a>

                                        </p>

                                        <?php
                                            if($user_id == $_SESSION['user_id']) {
                                                echo '<button class="btn btn-primary btn-round btn-sm" type="button" data-toggle="modal" data-target="#editSocialModal">Edit Social Info</button>';
                                                include './includes/editSocialModal.php';
                                            }
                                        ?>
                                        
                                    </div>                
                                </div>
                            </div>                    
                        </div>
                       
                        <div class="counter">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <div class="count-data text-center">
                                        <h6 class="count h2"><?php echo $total_feed; ?></h6>
                                        <p class="m-0px font-w-600">Community Feed</p>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="count-data text-center">
                                        <h6 class="count h2"><?php echo $total_post; ?></h6>
                                        <p class="m-0px font-w-600">Community Sell</p>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-3">
                                    <div class="count-data text-center">
                                        <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                                        <p class="m-0px font-w-600">Following</p>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="count-data text-center">
                                        <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                                        <p class="m-0px font-w-600">Followers</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <div class="card-box mt-3">
                            <div class="card-box-heading mb-4">
                                OWNER COMMUNITY POST
                            </div> 

                            <?php
                            require_once './config/database.php'; 
                            
                            if(isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }

                            $no_of_records_per_page = 10;
                            $offset = ($page-1) * $no_of_records_per_page;

                            $total_pages_sql = "SELECT count(*) FROM feeds where feeds.feed_user_id = $user_id";
                            $results = $mysqli->query($total_pages_sql);
                            $rows = $results->fetch_array();
                            $total_rows = $rows[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                            

                            $query = "SELECT * FROM feeds join users where feeds.feed_user_id = users.user_id AND users.user_id = $user_id LIMIT $offset, $no_of_records_per_page";

                            $result = $mysqli->query($query);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_array()) {
                                    $feed_id = $row['feed_id'];
                                    $feed_content = $row['feed_content'];
                                    $feed_created_time = $row['feed_created_time'];
                                    $feed_user_id = $row['user_id'];
                                    $user_name = $row['user_name'];
                                    $user_image = $row['user_image'];


                            ?>
                                


                                <div class="card mb-3 profile-post">                        
                                    <div class="profile-post-body">
                                        <img src="img/<?php echo $user_image ?>" class="post-user-img" alt="">
                                        <h4 class="card-title post-user"><?php echo $user_name ?></h4>
                                        <p class="card-text"><?php echo $feed_content ?></p>
                                        <a href="#" class="btn post-button"><b>View More</b></a>
                                        <p class="text-muted small post-date"><?php echo $feed_created_time ?></p>
                                    </div>
                                </div>
                            <?php
                                }
                            } else {
                                echo '<h2 class="text-center pb-4">Users does not have any feeds</h2>';
                            }
                        
                        ?>
                            
                            
                            
                           
                            <?php if($total_pages > 1) { ?>
                                <ul class="pagination justify-content-center mt-3 pb-3">
                                    
                                    <li class="page-item <?php echo $page <=1 ? 'disabled' : '' ?>"><a class="page-link" href="profile.php?user=<?php echo $user_id ?>&page=<?php echo ($page-1) ?>">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="profile.php?user=<?php echo $user_id ?>&page=<?php echo $page ?>"><?php echo $page; ?></a></li>
                                    <li class="page-item <?php echo $page >= $total_pages ? 'disabled' : '' ?>"><a class="page-link" href="profile.php?user=<?php echo $user_id ?>&page=<?php echo ($page+1) ?>">Next</a></li>
                                </ul>
                            <?php } ?>
        

                        </div>
                   
                </div>

                
                <div class="col-md-4 border chatbox">
                    <div class="chatbox-heading">
                        COMMUNITY CHAT
                    </div>
                    <div class="messages">
                        <ul>
                        <?php 
                            $session_uni_id = $_SESSION['user_uni_id'];
                            $query = "SELECT message_id, message_user_id, message_details, message_created_time,
                                    user_id, user_name, user_uni_id, user_image from messages join users
                                    where messages.message_user_id = users.user_id and users.user_uni_id = $session_uni_id ORDER BY message_id DESC;";

                            $result = $mysqli->query($query);
                            if($result->num_rows > 0) {
                                while($row = $result->fetch_array()) {
                                    $message_user_id = $row['message_user_id'];
                                    $message = $row['message_details'];
                                    $user_image = $row['user_image'];

                        ?>
                            <li class="<?php echo $message_user_id == $_SESSION['user_id'] ? 'replies' : 'sent' ?>">
                                <img src="img/<?php echo $user_image ?>" alt="" />
                                <p><?php echo $message ?></p>
                            </li>
                        <?php
                                }
                            }
                        ?>
                            
                           
                            
                            
                        </ul>
                    </div>
            
                    <form action="message.php" method="POST">
                        <div class="input-group mb-3 message-input">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <input type="hidden" name="cur_page" value="profile.php">
                            <input type="text" name="message" class="form-control" style="border-radius: 50px;
                            margin-right: 10px;" placeholder="Write Message" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <input name="message_sent" class="btn btn-outline-secondary" style="border-radius: 50px;
                            padding: 0 20px;" type="submit">
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

    </section>






    <?php include './includes/footer.php' ?>