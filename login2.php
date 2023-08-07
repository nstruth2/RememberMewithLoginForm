<?php
    session_start();
    include('config.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                $_SESSION['password'] = $result['password'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
                header('Location: aboutMePage.php');
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
                if(!empty($_POST['remember_checkbox']))
                {
                $remember_checkbox = $_POST['remember_checkbox'];
                setcookie('username',$username,time()+3600*24*7);
                setcookie('password',$password,time()+3600*24*7);
                setcookie('userlogin',$remember_checkbox,time()+3600*24*7);
                }
                else
                {
                    //expire cookie
                setcookie('username',$result['username'],30);
                setcookie('password',$password,30);
                }
                
            }
        }
?>