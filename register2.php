<!DOCTYPE html>
<html>

    <head>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="mystyle.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style type="text/css">
        * {
            font-family: tahoma, sans-serif;
        }
        </style>
    </head>
<?php
session_start();
require_once('config.php');

    $err = "";

    if (isset($_POST["submit"])) 
    {

        
        if (!empty($_POST["username"])) {

            $qUsername ="SELECT * FROM users WHERE username = :username";
            $users = $connection->prepare($qUsername);
            $users->execute(array(

                ':username'=>$_POST['username']

                ));

            if ($users->rowCount()) {
                
                $err .= "That Username is taken!<br>";

            }else{


                if (strlen($_POST["username"]) > 14) {
                    
                    $err .= "Username can be 14 characters maximum!<br>";

                }


                if (!preg_match("/^[\w .]+$/", $_POST["username"])) {
                    
                    $err .= "Username can be letters and numbers only!<br>";

                }else{

                    $username = $_POST["username"];

                }
            }
            
        }else{

            $err .= "Fill Username!<br>";
        }

        /***************************************/

        if (!empty($_POST["pass"])) {


            if (!empty($_POST["repass"])) {
                

            }else{

                $err .= "Fill repeat Password!<br>";

            }
            
        }else{

            $err .= "Fill Password!<br>";
        }

        /***************************************/

        if (!empty($_POST["pass"]) && !empty($_POST["repass"])) {

            if ($_POST["pass"] == $_POST["repass"]) {

                
                if (strlen($_POST["pass"]) < 8) {
                    
                    $err .= "Password must be at least 16 characters long!<br>";

                }

                if (strlen($_POST["pass"]) > 34) {
                    
                    $err .= "Password can't be 34 characters maximum!<br>";

                }

                if (!preg_match('/[A-Z]/', $_POST["pass"])) {
                    
                    $err .= "Password must contain a an uppercase letter!<br>";

                }

if (!preg_match('/[a-z]/', $_POST["pass"])) {
                    
                    $err .= "Password must contain a lowercase letter!<br>";

                }   

if (!preg_match('/[0-9]/', $_POST["pass"])) {
                    
                    $err .= "Password must contain a number!<br>";

                }             

                    if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_]).{8,16}$/', $_POST["pass"])) {
                        
                        $err .= "Password not strong enough!";

                    }

                else{

                        $password = $_POST["pass"];

                    }

                }

            }else{

                $err .= "Passwords don't match!<br>";

            }
            
        

        /***************************************/

        /***************************************/

        if (!empty($_POST["email"])) {

            $qEmail ="SELECT * FROM users WHERE email = :email";
            $users = $connection->prepare($qEmail);
            $users->execute(array(

                ':email'=>$_POST['email']

                ));

            if ($users->rowCount()) {
                
                $err .= "That Email is taken!<br>";

            }else{

                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    
                    $err .= "Please enter proper E-mail address!<br>";

                }else{

                    $email = $_POST["email"];

                }

            }
            
        }else{

            $err .= "Fill Email!<br>";
        }

        /***************************************/

        if (!$err == "") {
            
            echo 
            '<div class="col-md-12">
            <br>
            <div class="alert alert-danger" role="alert">
            '.$err.'
            </div>
            </div>';

        }
        else{
$password_hash = password_hash($password, PASSWORD_BCRYPT);
$query = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
if ($query->rowCount() == 0) {
$query->bindParam("username", $username, PDO::PARAM_STR);
$query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
$query->bindParam("email", $email, PDO::PARAM_STR);
$result = $query->execute();
echo '
            <div class="container">
            <br>
            <div class="col-md-12">
            <br>
            <div class="alert alert-success" role="alert">Registration was a success! 
            You can login now and continue to Your profile!</div>
            </div>
            </div>';
}
}
}

?>
<div class="container">
<br>
<form method="post">
                Username
                <input class="form-control" type="text" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
                Email
                <input class="form-control" type="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">

                Password

                <input class="form-control" type="password" name="pass">

                Repeat password

                <input class="form-control" type="password" name="repass">
  
                <input class="btn btn-success" type="submit" name="submit" value="register">

<a href="login2.php" class="btn btn-info btn-lg">
<span class="glyphicon glyphicon-log-in"></span> Log in
</a>
</form>
</div>
</body>
</html>