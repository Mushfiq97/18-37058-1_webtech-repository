<?php
require_once('../Controller/CheckSession.php')
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="width:500px;">
    <h1>profile info</h1>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>User name</th>
                <th>Gender</th>
                <th>Date of birth</th>
            </tr>
            <?php
            $data = file_get_contents("../data/data.json");
            $data = json_decode($data, true);
            foreach($data as $row)
            {
                if ($row['username'] == $_COOKIE['user'])
                echo '<tr>
                               <td>'.$row["name"].'</td>
                               <td>'.$row["e-mail"].'</td>
                               <td>'.$row["username"].'</td>
                               <td>'.$row["gender"].'</td>
                               <td>'.$row["dob"].'</td>
                               </tr>';

            }
            ?>
        </table>

    </div>
    <a class="btn btn-info" href="./dashboard.php">dashboard</a>
</div>
</body>
</html>
