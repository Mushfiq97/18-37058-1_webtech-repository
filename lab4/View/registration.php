<?php
require_once('../Controller/CheckLogin.php')
?>

<?php

include '../Controller/DataController.php';
$message = '';
$error = '';
if (isset($_POST["submit"])) {

    if (file_exists('../data/data.json')) {
        $extra = array(
            'name' => $_POST['name'],
            'e-mail' => $_POST["email"],
            'username' => $_POST["un"],
            'gender' => $_POST["gender"],
            'pass' => $_POST["pass"],
            'dob' => $_POST["dob"]
        );
        addData($extra);
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
    <h3>Registration</h3><br/>
    <form method="post">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
        <br/>
        <label>Name</label>
        <input type="text" name="name" class="form-control"/><br/>
        <label>E-mail</label>
        <input type="text" name="email" class="form-control"/><br/>
        <label>User Name</label>
        <input type="text" name="un" class="form-control"/><br/>
        <label>Password</label>
        <input type="password" name="pass" class="form-control"/><br/>
        <label>Confirm Password</label>
        <input type="password" name="Cpass" class="form-control"/><br/>

        <fieldset>
            <legend>Gender</legend>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="other">
            <label for="other">Other</label><br>

            <legend>Date of Birth:</legend>
            <input type="date" name="dob"> <br><br>
        </fieldset>

        <input type="submit" name="submit" value="sign up" class="btn btn-info"/><br/>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
    </form>

    <a class="btn btn-info" href="login.php">login</a>
</div>
<br/>
</body>
</html>