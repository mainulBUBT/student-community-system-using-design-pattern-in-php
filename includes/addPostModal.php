
    <div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="addPost.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" name="post_title" autofocus required>
                        </div><div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="post_price" required>
                        </div>

                        <div class="form-group">
                            <label for="image">Choose Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="post_image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title">Course Details</label>
                            <textarea name="post_details" id="" class="form-control"></textarea>
                        </div>

                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="addPost" value="Create Post">
                </div>

            </form>
            </div>
        </div>
    </div>
