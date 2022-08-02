<?php
session_start();
if (!empty($_SESSION["email"])) {
    header("Location: ./login.php");
}
require('../controller/signupformvalidation.php');
?>
<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />
    <title>registration page</title>
    <script src="../js/signupvalidation.js"></script>
</head>

<body>

</body>

</html>

<body>
    <div class="main-container">
        <div class="logo">
            <h3>news<span>DAILY</span></h3>
        </div>
        <div>
        <h1 class="raa-text">Register as admin</h1>
        <div class="si-tb">
        <p class="haa">Already have an account?</p>
        <a  class ="signin" href="./login.php">sign in</a>
        </div>
        </div>


        <div class="input-box">
            <form form action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validateForm()" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your user-name" />
                <p class="em"><?php echo $validateName; ?></p>
        </div>
        <div class="input-box">
            <input type="text" name="email"  id="email" placeholder="Enter your email address" />
            <p class="em"><?php echo $validateEmail; ?></p>
        </div>

        <div class="input-box">
            <input type="password" name="password" id="password" placeholder="Enter your password" />
            <p class="em"><?php echo $validPassword; ?></p>
        </div>

        <div class="input-box">
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="confirm your password" />
        </div>
        <div class="gender">
            <div>
            <p>Select Gender: </p> <input type="radio" class="gender-inp" name="gender" id="male" value="male" />
            <p>Male</p>
            <input type="radio" class="gender-inp" name="gender" id="female" value="female" />
            <p> Female</p>
            <input type="radio" class="gender-inp" name="gender" id="other" value="other" />
            <p> Other</p>
            </div>
            <p class="em" id="gem"><?php echo  $genderValidation; ?></p>
        </div>
        
        <div class="dob">
           <p class="dobp">Date of birth:</p> 

            <input type="date" id="birthday" name="birthday">
            <p class="em" id="date-validation"><?php echo $valiDate; ?></p>
        </div>


        <div class="button-signup">
            <input type="submit" value="sign up">
            <h1><?php echo $userAddingvalidation ?></h1>
            </form>
        </div>


    </div>
</body>

</html>