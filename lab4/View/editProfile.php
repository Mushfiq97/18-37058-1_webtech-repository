<?php
require_once('../Controller/CheckSession.php')
?>

<?php

include '../Controller/DataController.php';
$message = '';
$error = '';
$dod = "";
$gender = "";
if (isset($_POST["submit"])) {

    if (file_exists('../data/data.json')) {
        $extra = array(
            'name' => $_POST['name'],
            'e-mail' => $_POST["email"],
            'username' => $_POST["un"],
            'gender' => $_POST["gender"],
            'pass' => $_POST["pass"],
            'Cpass' => $_POST["Cpass"],
            'dob' => $_POST["dob"]
        );
        updateProfile($extra);
    } else {
        $error = 'JSON File not exits';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>edit profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br/>
<div class="container" style="width:500px;">
    <h3>Registration</h3><br/>

    <?php
    $data = file_get_contents("../data/data.json");
    $data = json_decode($data, true);
    foreach ($data as $row) {
        if ($row['username'] == $_COOKIE['user']) {
            echo '<form method="post">
        <br/>
        <label>Name</label>
        <input type="text" name="name" value=' . $row["name"] . ' class="form-control"/><br/>
        <label>E-mail</label>
        <input type="text" name="email" value=' . $row["e-mail"] . ' class="form-control"/><br/>
        <label>User Name</label>
        <input type="text" name="un" value=' . $row["username"] . ' class="form-control"/><br/>
        <label>enter new password to change password</label>
         <input type="password" name="pass" value=' . $row["pass"] . ' class="form-control"/><br/>
        <label>Enter password to update info</label>
        <input type="password" name="Cpass" class="form-control"/><br/>
        <input type="hidden" name="dob" value='.$row["dob"].'>
        <input type="hidden" name="gender" value='.$row["gender"].'>
        <input type="submit" name="submit" value="update" class="btn btn-info"/><br/>
    </form>';
            $dod = $row["dob"];
            $gender= $row["gender"];
        }

    }
    ?>


    <a class="btn btn-info" href="./dashboard.php">dashboard</a>
</div>
<br/>
</body>
</html>