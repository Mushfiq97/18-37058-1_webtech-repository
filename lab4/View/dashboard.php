<?php
require_once('../Controller/CheckSession.php')
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
    <h1>dashboard</h1>
    <h3>welcome back, <?PHP echo $_COOKIE['user']; ?></h3>
    <a class="btn btn-info" href="./viewprofile.php"> view profile</a><br>
    <br>
    <a class="btn btn-info" href="./editProfile.php">edit profile and change password</a><br><br>


    <a style="background-color: red"  class="btn btn-info" href="../Controller/Logout.php">logout</a>
</div>
</body>
</html>