<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$unameErr = $passErr = "";
$uname = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["uname"])) {
    $unameErr = "Name is required ";
  } else {
    $uname = $_POST["uname"];
    if (preg_match("/[^a-zA-Z0-9\.\-\_]/",$uname)) {
      $unameErr = "Only letters and white space allowed";
    } elseif (strlen($uname)<2) {
        $unameErr = "Atleast two characters required";
    }
  }
  
  if (empty($_POST["pass"])) {
    $passErr = "password is required";
  } else {
    $pass = $_POST["pass"];
    if (preg_match("/[^\@\#\$\%]+/",$pass)) {
      $passErr = "Password must contain at least one of the special characters (@, #, $, %)";
  }elseif (strlen($pass)<8) {
      $passErr = " Password must not be less than eight (8) characters";
  }
  }  
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<fieldset>
<legend>Login</legend>
	Username:
	<input type="text" name="uname" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>">
    <span class="error">* <?php echo $unameErr;?></span>
  <br><br>

	Password:
	<input type="password" name="pass" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
	<span class="error">* <?php echo $passErr;?></span>
  <br><br>

	<input id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>> <label for="remember">Remember Me</label>
	<br>
	<input type="submit" name="login" value="Submit">
  <a href="#">Forgot Password?</a>
</fieldset>
</form>