<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ./login.php");
}
?>
<?php

?>
<?php
include_once('../controller/profileUpdateValidation.php');
include_once('../controller/getprofiledata.php');

if ($userdata->num_rows > "0") {
    while ($row = $userdata->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $image =  $row['image'];
        $doj = $row['doj'];
    }
    $male = "";
    $female = "";
    $other = "";
    if ($gender == "male") {
        $male = "checked";
    } elseif ($gender == "female") {
        $female = "checked";
    } else {
        $other = "checked";
    }
    $time = strtotime($dob);
    $formatedDOB = date('Y-m-d', $time);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/profilesettings.css">
    <script src="../js/settings_jquery.js"></script>
    <script src="../js/settingsValidation.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="top-nav">
        <div class="logo item-1">
            <h3>news<span>DAILY</span></h3>
        </div>
        <div class="item-2">
            <p>Admin Dashboard</p>
        </div>
        <div class="item-3">
            <div class="profile-info">
                <div class="pic-area"><img src="<?php echo $image ?>" alt="profile image"></div>
                <div class="a2">
                    <p class="u-name"><?php echo $name ?></p>
                </div>
                <div class="a3">
                    <p>System Admin</p>
                </div>

            </div>
            <div class="btn-logout">
                <a href="../controller/logout.php">Sign Out</a>
            </div>
        </div>

    </div>


    <div class="nav-left">
    <a href="./home.php"  class="link">Dashboard</a>
        
        <a href="./profilesettings.php" id="dashboard-link" class="link">Settings</a>
    </div>
    <section id="sum-info">
        <div class="main-content">

            <div class="grid-container-profie p1">
                <h4>ID :</h4>
                <h4 class="label" id="id"><?php echo $id; ?></h4>
                <h4>Name :</h4>
                <h4 class="label"><?php echo $name; ?></h4>
                <h4>Email :</h4>
                <h4 class="label"><?php echo $email; ?></h4>
                <h4>Password : </h4>
                <h4 class="label"><?php echo $password; ?></h4>
                <h4>Gender :</h4>
                <h4 class="label"><?php echo $gender; ?></h4>
                <h4>Birth Date :</h4>
                <h4 class="label"><?php echo $dob; ?></h4>
                <h4>Joining Date :</h4>
                <h4 class="label"><?php echo $doj; ?></h4>
                <input id="pu-btn" type="button" value="update profile">
            </div>
            <form form action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
                <div class="grid-container-profie-update">

                    <div>
                        <h4>Name :</h4>
                        <input type="text" name="name" id="name" class="inputfield" placeholder="Enter your user-name" value="<?php echo $name; ?>" />

                    </div>
                    <div>
                        <h4>New Password : </h4>
                        <input type="password" name="password" class="inputfield" id="password" placeholder="Enter your new password" value="<?php echo $password; ?>" />

                    </div>
                    <div>
                        <h4>Confirm New Password : </h4>
                        <input type="password" name="confirmPassword" class="inputfield" id="confirmPassword" placeholder="confirm your password" value="<?php echo $password; ?>" />
                    </div>
                    <div>
                        <div class="gender">
                            <div>
                                <h4>Select Gender: </h4>
                                <input type="radio" class="gender-inp" name="gender" id="male" value="male" <?php echo $male; ?> />
                                <h4>Male</h4>
                                <input type="radio" class="gender-inp" name="gender" id="female" value="female" <?php echo $female; ?> />
                                <h4> Female</h4>
                                <input type="radio" class="gender-inp" name="gender" id="other" value="other" <?php echo $other; ?> />
                                <h4> Other</h4>
                            </div>
                        </div>
                    </div>

                    <div class="dob">
                        <h4 class="dobp">Date of birth:</h4>

                        <input type="date" class="inputfield" id="birthday" name="birthday" value="<?php echo $formatedDOB; ?>">

                    </div>
                    <div class="gender">
                        <h4><label for="image">update profile picture:</label></h4>
                        <br>
                        <input type="file"class="file-upload" id="image" name="image" accept="image/*" value="<?php echo $image; ?>">
                    </div>
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="profilePicPath" value="<?php echo $image; ?>">
                    <input type="submit" class="btn-ac"name="submit" value="submit">
                    <input id="cancel-u-btn" class="btn-ac" type="button" value="Cancel">
                    

                </div>
            </form>



        </div>
    </section>


</body>

</html>