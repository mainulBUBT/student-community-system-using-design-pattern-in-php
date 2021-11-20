<?php include './includes/header.php';
include 'message.php';
?>
<?php
	if(!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
		header("Location: login.php");
		exit;
	}
    

?>
</head>

<body>

    <?php include './includes/navbar.php' ?>


    <section id="head" class="p-3">
        <div class="container-fluid">
            <div class="row">

            <div class="col-md-8" style= "padding-top :8px;">
               
                    <div class="card-box">
                        <div class="card-box-heading">
                            COMMUNITY FEEDS
                        </div> 

                        <form action="addFeed.php" class="card-box-post" method="POST">
                            <textarea name="user_feed" placeholder="Share what you've been up to..." class="form-control"></textarea>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                            <div class="actions">
                                <button type="submit" class="btn post-button" name="addFeed">
                                    Post
                                </button>
                            </div>
                        </form> 


                            <?php
                                    foreach ($feeds as $feed){?>
                                <!-- POST -->
                                <div class="card mb-3 post">                        
                                    <div class="card-body">
                                        
                                        <img src="img/<?php echo $feed->user_image ?>" class="post-user-img" alt="">
                                        <h4 class="card-title post-user"><a href="profile.php?user=<?php echo $feed->feed_user_id; ?>"><?php echo $feed->user_name ?></a></h4>
                                        <p class="card-text"><?php echo $feed->feed_content ?></p>
                                        <a href="#" class="btn post-button"><b>View More</b></a>
                                        <p class="text-muted small post-date"><?php echo $feed->feed_created_time ?></p>

                                    </div>
                                </div>
                                <?php
                                    }
                                    ?>

                    
                        
                        <ul class="pagination justify-content-center mt-3 pb-3">
                          </ul>
                    </div>
                    
                </div>

                
                <div class="col-md-4 border chatbox">
                    <div class="chatbox-heading">
                        COMMUNITY CHAT
                    </div>
                    <div class="messages">
                        <ul>

                        <?php
                                    foreach ($message as $messages){
                                        ?>
                            <li class="<?php echo $messages->message_user_id == $_SESSION['user_id'] ? 'replies' : 'sent' ?>">
                                <img src="img/<?php echo $messages->user_image ?>" alt="" />
                                <p><?php echo $messages->message_details ?></p>
                            </li>

                        <?php
                                
                            }

                        ?>

                        </ul>
                    </div>

                    <form action="message.php" method="POST">
                        <div class="input-group mb-3 message-input">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                            <input type="hidden" name="cur_page" value="index.php">
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



