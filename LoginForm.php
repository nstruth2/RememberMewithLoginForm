<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
  </head>
  <body>
<?php
print_r($_COOKIE);
?>
<form method="post" action="login2.php" name="signin-form">
  <div class="form-element">
    <label style="color: white">Username</label>
    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required value="<?php if(isset($_COOKIE['username'])){ echo $_COOKIE['username'];};?>">
  </div>
  <div class="form-element">
    <label style="color: white">Password&nbsp; </label>
    <input type="password" name="password" required value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];};?>">
  </div>
<div>
<label for="rememberMeCheckbox" style="color: white">Remember Me</label><input type="checkbox" name="remember_checkbox" value="<?php if(isset($_COOKIE['userlogin'])){ echo $_COOKIE['userlogin'];};?>">
</div>
  <button type="submit" name="login" value="login">Log In</button>
</form>    
<a href="register2.php"><img src="RegisterButton.png"></a>
</body>
</html>