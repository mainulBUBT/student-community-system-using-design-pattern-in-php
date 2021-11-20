


<div class="modal fade" id="editSocialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" name="facebook_link" value="<?php echo $facebook_link ?>" placeholder="Enter Facbook username" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control" name="instagram_link" value="<?php echo $instagram_link ?>" placeholder="Enter Instagram username">
                        </div>
                        <div class="form-group">
                            <label for="google">Google</label>
                            <input type="text" class="form-control" name="google_link" value="<?php echo $google_link ?>" placeholder="Enter Mail Address">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control" name="twitter_link" value="<?php echo $twitter_link ?>" placeholder="Enter Twitter username">
                        </div>

                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="editSocial" value="Submit">
                </div>

            </form>
            </div>
        </div>
    </div>

