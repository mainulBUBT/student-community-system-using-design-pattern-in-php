<?php



interface Classified
{
    public function AddPost($user_id, $post_title, $post_price, $fileName, $post_details);
    public function DetailsAds($post_id);
    public function AdsIndex();

}


class AdsAdd implements Classified
{


    public function AddPost($user_id, $post_title, $post_price, $fileName, $post_details)
    {

        global $mysqli;
        $param_user_id = $param_post_price = $param_post_title = $param_post_image = $param_post_details = "";
        $query = "INSERT INTO posts (post_user_id, post_title, post_price, post_image, post_desc) VALUES (?, ?, ?, ?, ?)";


        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("sssss", $param_user_id, $param_post_title, $param_post_price, $param_post_image, $param_post_details);
            $param_user_id = $user_id;
            $param_post_title = $post_title;
            $param_post_price = $post_price;
            $param_post_image = $fileName;
            $param_post_details = $post_details;

            if ($stmt->execute()) {
                header('Location: post.php');
            } else {
                echo "Something went wrong please try again.";
            }

            $stmt->close();
        }
    }

    public function DetailsAds($post_id)
    {
        global $mysqli;
        $query = "SELECT * FROM posts join users WHERE posts.post_user_id = users.user_id AND posts.post_id = $post_id ";
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

    public function AdsIndex()
    {  
       
        global $mysqli;
        $query = "SELECT * FROM posts join users where posts.post_user_id = users.user_id";

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

abstract class ClassifiedFactory
{

    abstract public function finalShow(): Classified;
}

class AdsAddFactory extends ClassifiedFactory
{
    public function finalShow(): Classified
    {
        return new AdsAdd;
    }
}



if (isset($_POST['addPost'])) {

    $targetDir = "img/";
    $fileName = basename($_FILES["post_image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $statusMsg = "";

    $post_title = $_POST['post_title'];
    $post_price = $_POST['post_price'];
    $post_details = $_POST['post_details'];
    $user_id = $_POST['user_id'];


 
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {

        if (move_uploaded_file($_FILES["post_image"]["tmp_name"], $targetFilePath)) {

            require_once('./config/database.php');

            $ads = new AdsAddFactory();
            $ads = $ads->finalShow();
            $ads = $ads->AddPost($user_id, $post_title, $post_price, $fileName, $post_details);
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}



    ?>
