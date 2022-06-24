<?php
require_once('../Controller/CheckLogin.php')
?>
<?php

include '../Controller/DataController.php';

if (isset($_POST["submit"])) {

    if (file_exists('../data/data.json')) {
        $extra = array(

            'username' => $_POST["un"],
            'pass' => $_POST["pass"]
        );
        $message= checkLoginData($extra);
    } else {
        $error = 'JSON File not exits';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Append Data to JSON File using PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br/>
<div class="container" style="width:500px;">
    <h3>login</h3><br/>
    <form method="post">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
        <br/>

        <label>User Name</label>
        <input type="text" name="un" class="form-control"/><br/>
        <label>Password</label>
        <input type="password" name="pass" class="form-control"/><br/>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
        <br>

        <input type="submit" name="submit" value="Login" class="btn btn-info"/><br/>

    </form>
    <a class="btn btn-info" href="./registration.php">register</a>
    <a class="btn btn-info" href="./forgotPassword.php">forgot password</a>
</div>
<br/>
</body>
</html>