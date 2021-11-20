

<div class="modal fade" id="editProfileImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit your Profile Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="editProfile.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="image">Choose Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="user_image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="editProfileImage" value="Update Image">
                </div>

            </form>
            </div>
        </div>
    </div>

 