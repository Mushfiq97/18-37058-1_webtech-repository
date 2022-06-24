<?php
include '../Model/Model.php';
$message = '';
$error = '';
function loadData()
{
    return readData();

}

function addData($data)
{
    $final_data = storeData($data);
    if (file_put_contents('../data/data.json', $final_data)) {
        header("location:../View/login.php");
    }

}







function updateProfile($userData){


    $data = file_get_contents("../data/data.json");
    $handle2 = json_decode($data);
    $email = 'e-mail';
    foreach ($handle2 as $json){
        if( $_SESSION['user']=== $json->username)
        {
            if ($json->pass==$userData["Cpass"]){
                $json->name=$userData["name"];
                $json->$email =$userData["e-mail"];
                $json->username=$userData["username"];
                $json->pass=$userData["pass"];
                $json->gender=$userData["gender"];
                $json->dob=$userData["dob"];
                $_SESSION["user"] = $userData["username"];
                setcookie('user', $userData["username"], time() + (86400 * 30));
                $encode = json_encode($handle2);
                file_put_contents('../data/data.json',$encode);
                header("location:../View/viewprofile.php");

            }

            else{
                echo"enter your current valid password";
            }

            break;
        }
    }



}

function checkLoginData($userData)
{
    $data = readData("../data/data.json");
    foreach ($data as $row) {
        if ($row["username"] == $userData["username"] && $row["pass"] == $userData["pass"]) {
            //session
            session_start();
            $_SESSION['user']= $userData["username"];
            //cookie
            setcookie('user', $userData["username"], time() + (86400 * 30));

            echo "Cookie setup done<br>";
            echo $_COOKIE['user'];

            header("location:../View/dashboard.php");
        }


    }
    return 'username or password was incorrect';

}

function checkEmail($userData)
{
    $data = readData("../data/data.json");
    foreach ($data as $row) {
        if ($row["e-mail"] == $userData["email"]) {


            return "email found";
        }
        else{
            return 'email not found';
        }

    }

}

function studentInfo($data)
{

    $all_data = readData();
    foreach ($all_data as $row) {
        if ($row['name'] == $data) {
            $d_data = array(
                'name' => $row['name'],
                'e-mail' => $row['e-mail'],
                'username' => $row['username'],
                'gender' => $row['gender'],
                'dob' => $row['dob'],
            );
            return $d_data;
        }
    }

}

?>