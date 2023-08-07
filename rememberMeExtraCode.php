value="<?php echo $_COOKIE["password"]; ?>"
value="<?php echo $_COOKIE["username"]; ?>"

       if(!empty($_POST['remember_checkbox']))
                {
                $remember_checkbox = $_POST['remember_checkbox'];
                setcookie('username',time()+3600);
                setcookie('password',time()+3600*24*7);
                setcookie('userlogin', $remember_checkbox,time()+3600*24*7);
                }

                setcookie ("username",$_SESSION["username"],time()+ 3600*24*7);