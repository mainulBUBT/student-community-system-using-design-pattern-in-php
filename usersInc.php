<?php

require_once './config/database.php';

interface Observer
{
    function onChanged($post);
}
interface Observable
{
    function addObserver($observer);
}
class UserLogin implements Observable
{
    private $_observers = array();

    public function addCustomer($post)
    {

        foreach ($this->_observers as $obs)
            $obs->onChanged($post);
    }
    public function addObserver($observer)
    {
        $this->_observers[] = $observer;
    }
}
class UserLoginLogger implements Observer
{


    public function onChanged($post)
    {
        $hashed_password = $id = $param_email = $user_uni_id = $email = $password = "";

        global $mysqli;
        
        if (empty(trim($_POST['email']))) {
?>
            <div class="alert alert-warning" role="alert">
                please enter your email address.
            </div>
        <?php
        } else {
            $email = trim($_POST['email']);
        }

        
        if (empty(trim($_POST['password']))) {
        ?>
            <div class="alert alert-warning" role="alert">
                please enter your Password.
            </div>
            <?php

        } else {
            $password = trim($_POST['password']);
        }

        if (empty($email_err) && empty($password_err)) {

            $sql = "SELECT user_id, user_email, user_password, user_uni_id FROM `users` WHERE users.user_email = ?";

            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("s", $param_email);
                $param_email = $email;

                if ($stmt->execute()) {
                    $stmt->store_result();

                    if ($stmt->num_rows == 1) {
                        $stmt->bind_result($id, $email, $hashed_password, $user_uni_id);

                        if ($stmt->fetch()) {
                            if (password_verify($password, $hashed_password)) {

                                $_SESSION['loggedIn'] = true;
                                $_SESSION['user_id'] = $id;
                                $_SESSION['user_uni_id'] = $user_uni_id;

                                header("Location: index.php");
                            } else {
                                $password_err = $hashed_password;
                            }
                        }
                    } else {
            ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid email address, please try again.
                        </div>
                    <?php


                    }
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        something went wrong, please try again.
                    </div>
<?php

                }
                
                $stmt->close();
            }
        }

    }
}





class UserRegistration implements Observable
{
    private $_observers = array();

    public function addCustomer($post)
    {

        foreach ($this->_observers as $obs)
            $obs->onChanged($post);
    }
    public function addObserver($observer)
    {
        $this->_observers[] = $observer;
    }
}
class UserRegistrationLogger implements Observer
{


    public function onChanged($post)
    {
        $param_email = $email = $password = "";
        $param_name = $param_uni_id = $param_password = $param_created_time = "";

        global $mysqli;
   
        if (empty($_POST['name'])) {
            $name_err = "please enter an username";
        } else {
            $name = $_POST['name'];
        }

        if (empty($_POST['email'])) {
            $email_err = "please enter an email";
        } else {
            $email = $_POST['email'];
        }

        if (empty($_POST['password'])) {
            $password_err = "Please enter a password";
        } else if (strlen(trim($_POST['password'])) < 6) {
            $password_err = "password must be at least 6 charecter long";
        } else {
            $password = trim($_POST['password']);
        }

        
        if (empty($name_err) && empty($email_err) && empty($password_err)) {

            $query = "INSERT INTO `users` (user_name, user_uni_id, user_email, user_password, user_created_time) VALUES (?, ?, ?, ?, ?);";
            if ($stmt = $mysqli->prepare($query)) {
                $stmt->bind_param("sssss", $param_name, $param_uni_id, $param_email, $param_password, $param_created_time);
                $param_name = $name;
                $param_uni_id = $_POST['university'];
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                $param_created_time = date('Y-m-d H:i:s');


                if ($stmt->execute()) {
                    header('Location: login.php');
                } else {
                    echo "Something went wrong please try again.";
                }

                
                $stmt->close();
            }
        }
    }
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ul = new UserLogin();
    $ul->addObserver(new UserLoginLogger());
    $ul->addCustomer($_POST);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ul = new UserRegistration();
    $ul->addObserver(new UserRegistrationLogger());
    $ul->addCustomer($_POST);
}


?>