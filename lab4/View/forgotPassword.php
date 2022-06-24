<?php
require_once('../Controller/CheckSession.php')
?>
<?php

include '../Controller/DataController.php';

if (isset($_POST["submit"])) {

    if (file_exists('../data/data.json')) {
        $extra = array(

            'email' => $_POST["email"]
        );
        $message = checkEmail($extra);
    } else {
        $error = 'JSON File not exits';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>
<div class="container" style="width:500px;">
    <h1>forgot password</h1>

    <form method="post">
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
        <br/>

        <label>enter email</label>
        <input type="email" name="email" class="form-control"/><br/>
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
        <br>

        <input type="submit" name="submit" value="suibmit" class="btn btn-info"/><br/>

    </form>
    <a href="./login.php">login</a>
</div>
</body>
</html>