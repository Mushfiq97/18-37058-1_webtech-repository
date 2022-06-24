<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
#npass {color: green;}
#rpass {color: red;}
</style>
</head>
<body>  

<?php
$npassErr = $passErr = $rpassErr = "";
$npass = $pass = $rpass ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["npass"])) {
    $npassErr = "password is required";
  } else {
    $npass = $_POST["npass"];
    if (preg_match("/[^\@\#\$\%]+/",$npass)) {
      $npassErr = "Password must contain at least one of the special characters (@, #, $, %)";
  }elseif (strlen($pass)<8) {
      $npassErr = " Password must not be less than eight (8) characters";
  }
  }
  $pass=$_POST["pass"];
  if($pass===$npass)
  {
    $npassErr="New Password should not be same as the Current Password";
  }

  $rpass=$_POST["rpass"];
  if($rpass!==$npass)
  {
    $npassErr="New Password must match with the Retyped Password";
  }

}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<fieldset>
<legend>CHANGE PASSWORD</legend>
Current Password:
<input type="password" name="pass" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
	<span class="error">* <?php echo $passErr;?></span>
  <br><br>
	
  <span id="npass">New Password:</span>
  <input type="password" name="npass" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
	<span class="error">* <?php echo $npassErr;?></span>
  <br><br>

  <span id="rpass">Retyped New Password:</span>
	<input type="rpassword" name="rpass">
	<span class="error">* <?php echo $rpassErr;?></span>
  <br>

    <hr>
	<input type="submit" name="login" value="Submit">
</fieldset>
</form>