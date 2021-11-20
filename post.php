<?php include './includes/header.php' ?>
<?php include './config/database.php';
include 'message.php';
include 'addPost.php';

?>

</head>

<body>

<?php include './includes/navbar.php' ?>


    <section id="head" class="p-3">
        <div class="container-fluid">
            <div class="row">

                
                <div class="col-md-8">
                    <div class="d-flex justify-content-center row mt-2">
                        <div class="col-md-10">
                            <div class="row p-2 bg-white border rounded">
                                <button class="btn btn-new-ads" type="button" data-toggle="modal" data-target="#addPostModal"><i class="fa fa-plus-square"></i> Add Post</button>
                                <?php include './includes/addPostModal.php' ?>
                             </div>
                        </div>
                        <?php
                            require_once './config/database.php'; 
                            
                            $adsShow = new AdsAddFactory();
                            $adsShow = $adsShow->finalShow();
                            $adsShow = $adsShow->AdsIndex();


                            ?>
                               <?php
                                         foreach ($adsShow as $adsShows){
                                        ?>
                                <div class="col-md-10">
                                    <div class="row p-2 bg-white border rounded">
                    
                                        <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="img/<?php echo $adsShows->post_image ?>">
                                        </div>
                                        <div class="col-md-6 mt-1">
                                            <h5><?php echo $adsShows->post_title ?></h5>
                                            <div class="item-show">
                                                <p><i class='far fa-clock'></i> <?php echo $adsShows->post_created_time ?></p>
                                               
                                                <p><i class='fas fa-user-alt'></i> <?php echo $adsShows->user_name ?></p>
                                            </div>                       
                                        </div>
                                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                            <div class="d-flex flex-row align-items-center">
                                                <h4 class="mr-1">৳<?php echo $adsShows->post_price ?></h4>
                                            </div>
                                            
                                            <div class="d-flex flex-column mt-4">
                                                <a href="post-details.php?post=<?php echo $adsShows->post_id?>" class="btn btn-primary btn-sm">Details</a>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }

                        ?>

                         
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
                            <input type="hidden" name="cur_page" value="post.php">
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