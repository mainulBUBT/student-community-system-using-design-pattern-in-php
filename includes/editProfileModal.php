


<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit your Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="editProfile.php" method="POST">
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="name">Edit Name</label>
                            <input type="text" class="form-control" name="user_name" value="<?php echo $user_name ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="email">Edit Email</label>
                            <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="about_me">Your Department Name</label>
                            <textarea name="user_about_me" id="" class="form-control"><?php echo $user_about_me ?></textarea>
                        </div>

                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="editProfile" value="Submit">
                </div>

            </form>
            </div>
        </div>
    </div>

 