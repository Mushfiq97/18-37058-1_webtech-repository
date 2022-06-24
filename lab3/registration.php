<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $passErr = $genderErr = $npassErr =$emailErr= "";
$name = $email = $gender = $pass = $npass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = $_POST["name"];

    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }
}

$message = '';  
$error = '';  
if(isset($_POST["submit"]))  
{  
     if(empty($_POST["name"]))  
     {  
          $error = "<label class='text-danger'>Enter Name</label>";  
     }
     else if(empty($_POST["email"]))  
     {  
          $error = "<label class='text-danger'>Enter an e-mail</label>";  
     }  
     else if(empty($_POST["un"]))  
     {  
          $error = "<label class='text-danger'>Enter a username</label>";  
     }  
     else if(empty($_POST["pass"]))  
     {  
          $error = "<label class='text-danger'>Enter a password</label>";  
     }
     else if(empty($_POST["Cpass"]))  
     {  
          $error = "<label class='text-danger'>Confirm password field cannot be empty</label>";  
     } 
     else if(empty($_POST["gender"]))  
     {  
          $error = "<label class='text-danger'>Gender cannot be empty</label>";  
     } 
      
     else  
     {  
          if(file_exists('data.json'))  
          {  
               $current_data = file_get_contents('data.json');  
               $array_data = json_decode($current_data, true);  
               $extra = array(  
                    'name'               =>     $_POST['name'],  
                    'e-mail'          =>     $_POST["email"],  
                    'username'     =>     $_POST["un"],  
                    'gender'     =>     $_POST["gender"],  
                    'dob'     =>     $_POST["dob"]  
               );  
               $array_data[] = $extra;  
               $final_data = json_encode($array_data);  
               if(file_put_contents('data.json', $final_data))  
               {  
                    $message = "<label class='text-success'>File Appended Success fully</p>";  
               }  
          }  
          else  
          {  
               $error = 'JSON File not exits';  
          }  
     }  
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<fieldset>
<legend>REGISTRATION</legend> 
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><hr>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><hr>
  Username:
	<input type="text" name="uname" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>">
    <span class="error">* </span>
  <br><hr>
  Password:
<input type="password" name="pass" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
	<span class="error">* <?php echo $passErr;?></span>
  <br><hr>
	
  <span id="npass">Confirm Password:</span>
  <input type="password" name="npass" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>">
	<span class="error">* <?php echo $npassErr;?></span>
  <br><hr>
  <fieldset>
<legend>Gender</legend>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br>
</fieldset>
  <hr>
  <fieldset>
<legend>Date of birth</legend>
  <input type="number" name="day">/
  <input type="number" name="month">/
  <input type="number" name="year"> (dd/mm/yyyy)
  <br>
</fieldset>
  <hr>
  <input type="submit" name="submit" value="Submit">  
  <input type="submit" name="reset" value="Reset">
</fieldset>
</form>

</body>
</html>