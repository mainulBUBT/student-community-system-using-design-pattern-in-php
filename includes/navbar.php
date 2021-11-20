<nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand logo"><i class="fas fa-satellite-dish"></i> StudCommunity</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link"><i class="fas fa-home"> Home</i></a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php?user=<?php echo $_SESSION['user_id'];?>" class="nav-link"><i class="fas fa-user-alt"> Profile</i></a>
                    </li>
                    <li class="nav-item">
                        <a href="post.php" class="nav-link"><i class="fas fa-plus-square"> Post Ad</i></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"> Logout</i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>