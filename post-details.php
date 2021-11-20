<?php include './includes/header.php' ?>
<?php include './config/database.php' ?>
<?php include 'addPost.php' ?>
</head>


<?php 

if(isset($_GET['post'])) {
    $post_id = $_GET['post'];
    $adsShow = new AdsAddFactory();
    $adsShow = $adsShow->finalShow();
    $adsShow = $adsShow->DetailsAds($post_id);
}

?>


<body>

<?php include './includes/navbar.php' ?>


    <section id="head" class="p-3">
        <div class="container-fluid">
            <div class="row">

                
                <div class="col-md-8">
                    <?php
                    foreach ($adsShow as $ads){?>
                    <div class="card mx-auto">
                        <div class="card-body">
                            <div class="logo mb-3"><img class="img-fluid" src="img/<?php echo $ads->post_image ?>" /></div>
                            <h3 class="card-title"><?php echo $ads-> post_title ?></h3>
                            <h6 class="card-subtitle mb-2 text-muted note"><?php echo $ads->post_desc ?></h6>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <p class="text-muted"><i class="far fa-check-circle"></i> Price</p>
                                    <p class="text-muted"><i class="far fa-check-circle"></i> Posted On</p>
                                    
                                    <p class="text-muted"><i class="far fa-check-circle"></i> Posted By</p>
                                    <p class="text-muted"><i class="far fa-check-circle"></i> Contact Number</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted"><i class='far fa-clock'></i> <?php echo $ads->post_price ?></p>
                                    <p class="text-muted"><i class='far fa-clock'></i> <?php echo $ads->post_created_time ?></p>
                                    
                                    <p class="text-muted"><i class='fas fa-user-alt'></i> <?php echo $ads->user_name ?></p>
                                    <p class="text-muted"><a class="btn text-primary" href="mailto:<?php echo $ads->user_email ?>" ><i class="fa fa-google"></i> Click here</a></p>
                                </div> 
                                <div class="col-md-12">
                                    <div class="d-flex flex-column mt-4"><a href="post.php" class="btn btn-primary btn-sm" role="button">BACK TO ADS</a><button class="btn btn-outline-primary btn-sm mt-2" type="button">REPORT THIS AD</button></div>
                                </div>                                       
                           </div>             
                        </div>
                    </div>
                    <?php
                    }
                        ?>

                </div>

               
            </div>
        </div>

    </section>




<?php include './includes/footer.php' ?>