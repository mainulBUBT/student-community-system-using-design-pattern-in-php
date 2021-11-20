<?php

require_once('./config/database.php');


interface Posts
{
    public function PostShow($post);
    public function PostIndex();
}


class PostFeed implements Posts
{


    public function PostShow($post)
    {

        global $mysqli;
        $param_feed_content = $param_user_id = "";
        $feed_content = $_POST['user_feed'];
        $user_id = $_POST['user_id'];

        $query = "INSERT INTO feeds (feed_user_id, feed_content) VALUES (?, ?)";
    
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("ss", $param_user_id, $param_feed_content);
            $param_user_id = $user_id;
            $param_feed_content = $feed_content;
    
            if ($stmt->execute()) {
                header('Location: index.php');
            } else {
                ?>
            <div class="alert alert-warning" role="alert">
            Something went wrong please try again.
            </div>
            <?php
            }
    

            $stmt->close();
        } else {
            die("error: " . $mysqli->error);
        }
    }

    public function PostIndex(){
        $session_uni_id = $_SESSION['user_uni_id'];
        global $mysqli;
        $query = "SELECT * FROM feeds join users where feeds.feed_user_id = users.user_id AND users.user_uni_id = $session_uni_id Order by feeds.feed_id DESC";
        $result = $mysqli->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = mysqli_fetch_object($result)) {
				$data[] = $row;
			}
			return $data;
		} else {
			echo "No found records";
		}
    }
}

abstract class PostFactory
{

    abstract public function finalShow(): Posts;
}

class PostFeedFactory extends PostFactory
{
    public function finalShow(): Posts
    {
        return new PostFeed;
    }
}


if (isset($_POST['addFeed'])) {

    

    $feeds = new PostFeedFactory();
    $feeds = $feeds->finalShow();
    $feeds = $feeds->PostShow($_POST);

}

$feeds = new PostFeedFactory();
$feeds = $feeds->finalShow();
$feeds = $feeds->PostIndex();
?>