<?php
include('../controller/logincheck.php');

if (isset($_SESSION['email'])) {
    header("location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/signinstyle.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <div class="grid-container">
            <div class="item1">
                <h3>news<span>DAILY</span></h3>
            </div>

            <div class="item2">
                <p class="text-login">Log in as admin:
                </p>
            </div>
            <div class="item3">
                <input type="text" name="email" placeholder="Enter your email" />
            </div>
            <div class="item4">
                <input type="password" name="password" placeholder="Enter your password" />
                <p class="text-error"> <?php echo $error; ?></p>
            </div>

            <div class="item5">
                <input id="submit-btn" name="submit" type="submit" value="sign in">
            </div>
    </form>
    <div class="item6">
        <!-- <a href="">forgotten password?</a> -->
    </div>
    <div id="sign-up-btn"> <a href="./signup.php"> sign up</a></div>

    </div>
</body>

</html>