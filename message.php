<?php 

require_once './config/database.php';
include 'addFeed.php';

class Messages implements Posts
{


    public function PostShow($post)
    {

        global $mysqli;
        $param_message_details=$param_user_id = "";
        $user_id = $_POST['user_id'];
        $cur_page = $_POST['cur_page'];
        $message_details = $_POST['message'];

        $query = "INSERT INTO `messages` (message_user_id, message_details) VALUES (?, ?);";
            if($stmt = $mysqli->prepare($query)) {
                $stmt->bind_param("ss", $param_user_id, $param_message_details);
                $param_user_id = $user_id;
                $param_message_details = $message_details;
                


                if($stmt->execute()) {
                    if($cur_page == 'profile.php') {
                        header('Location: profile.php?user=' . $user_id);
                    }elseif($cur_page == 'post.php') 
                    {
                        header('Location: post.php');
                    }
                    else {
                        header('Location: index.php');
                    }
                    
                } else {
                    echo "Something went wrong please try again.";
                }

                //close statement
                $stmt->close();
            }
    }

    public function PostIndex(){
        $session_uni_id = $_SESSION['user_uni_id'];
        global $mysqli;
        $query = "SELECT message_id, message_user_id, message_details, message_created_time,
        user_id, user_name, user_uni_id, user_image from messages join users
        where messages.message_user_id = users.user_id and users.user_uni_id = $session_uni_id ORDER BY message_id DESC;";
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

class MessageFactory extends PostFactory
{
    public function finalShow(): Posts
    {
        return new Messages;
    }
}

    if(isset($_POST['message_sent'])) {

        $message = new MessageFactory();
        $message = $message->finalShow();
        $message = $message->PostShow($_POST);

        
    }
    $message = new MessageFactory();
    $message = $message->finalShow();
    $message = $message->PostIndex();
